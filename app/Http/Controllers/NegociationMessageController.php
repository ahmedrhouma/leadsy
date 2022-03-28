<?php

namespace App\Http\Controllers;

use App\Services\NegotiationService;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class NegociationMessageController extends Controller implements MessageComponentInterface
{
    const ERROR_MESSAGE_STATUS = 201;
    const SUCCESS_MESSAGE_STATUS = 200;


    const ADMIN_ROLE = 1;
    const ADVERTISER_ROLE = 2;
    const AGENT_ROLE = 4;
    const PUBLISHER_ROLE = 3;
    private $connections = [];
    private $users = [];
    private $administration = [];
    private $negotiations = [];
    private $negotiation;

    public function __construct()
    {
        $this->negotiation = new NegotiationService();
    }

    function onOpen(ConnectionInterface $conn)
    {
        $this->connections[$conn->resourceId] = $conn;
    }


    function onClose(ConnectionInterface $conn)
    {
        $disconnectedId = $conn->resourceId;
        unset($this->connections[$disconnectedId]);
        if (($key = array_search($conn->resourceId, $this->users)) !== false) {
            foreach ($this->administration as $agent) {
                $this->connections[$agent]->send(json_encode([
                    'action' => 'closedConnection',
                    'id' => $key,
                ]));
            }
            unset($this->users[$key]);
        }
        if (($key = array_search($conn->resourceId, $this->administration)) !== false) {
            unset($this->administration[$key]);
            $this->negotiations = array_filter($this->negotiations, function($value) use($key){
                return $value != $key;
            });
        }
    }


    function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred with user : {$e->getMessage()}\n";

        if (($key = array_search($conn->resourceId, $this->users)) !== false) {
            unset($this->users[$key]);
        }
        if (($key = array_search($conn->resourceId, $this->administration)) !== false) {
            $this->negotiations = array_filter($this->negotiations, function($value) use($key){
                return $value != $key;
            });
            unset($this->administration[$key]);
        }
        unset($this->connections[$conn->resourceId]);
        $conn->close();
    }

    function onMessage(ConnectionInterface $conn, $msg)
    {
        $content = json_decode($msg, true);

        switch ($content['action']) {
            case 'attach':
                if ($content['role'] == self::ADMIN_ROLE || $content['role'] == self::AGENT_ROLE) {
                    $this->administration[$content['user_id']] = $conn->resourceId;
                    break;
                }else{
                    foreach ($this->administration as $agent) {
                        $this->connections[$agent]->send(json_encode([
                            'action' => 'openConnection',
                            'id' => $content['user_id'],
                        ]));
                    }
                }
                $this->users[$content['user_id']] = $conn->resourceId;
                break;
            case 'message':
                $receiver_id = NULL;
                /* Check sender role */
                if ($content['role'] == self::ADVERTISER_ROLE || $content['role'] == self::PUBLISHER_ROLE) {
                    /* Check if already has conversation */
                    if (!isset($this->negotiations[$content['negotiation_id']])) {
                        $campaign = $this->negotiation->getCampaign($content['negotiation_id']);
                        $response = $content;
                        $response['campaign'] = $campaign;
                        $response['action'] = 'assigned';
                        /* Send attach request to agents and admin */
                        foreach ($this->administration as $agent) {
                            $this->connections[$agent]->send(json_encode($response));
                        }
                    } else {
                        /* Attach receiver when already have conversation */
                        $receiver_id =  $this->negotiations[$content['negotiation_id']];
                    }
                } else {
                    $receiver_id = $content['receiver_id'];
                    if (!isset($this->negotiations[$content['negotiation_id']])) {
                        $this->negotiations[$content['negotiation_id']] = $content['sender_id'];
                    }
                }

                /* Store Message  */
                if ($message = $this->negotiation->storeMessage($content['sender_id'], $receiver_id, $content['content'], $content['negotiation_id'])) {
                    /* Send to receiver if connected  */
                    $content['status'] = self::SUCCESS_MESSAGE_STATUS;
                    $content['message_sent'] = $message->message_sent;
                    $conn->send(json_encode($content));
                    if ($content['role'] == self::ADVERTISER_ROLE || $content['role'] == self::PUBLISHER_ROLE) {
                        if ($receiver_id != null) {
                            $this->connections[$this->administration[$receiver_id]]->send(json_encode($content));
                        }
                    } else if (isset($this->users[$content['receiver_id']])) {
                        $this->connections[$this->users[$content['receiver_id']]]->send(json_encode($content));
                    }
                } else {
                    /* return error message when not stored  */
                    $conn->send(json_encode([
                        'action' => 'message',
                        'sender_id' => $content['sender_id'],
                        'status' => self::ERROR_MESSAGE_STATUS
                    ]));
                }
                break;
            case 'seen':
                $this->negotiation->openConversation($content['negotiation_id'], $content['sender_id']);
                if (in_array($content['role'], [self::ADVERTISER_ROLE, self::PUBLISHER_ROLE])) {
                    if (isset($this->administration[$content['receiver_id'] ?? ''])) {
                        $this->connections[$this->administration[$content['receiver_id']]]->send($msg);
                    }
                } else if (isset($this->users[$content['receiver_id'] ?? ''])) {
                    $this->connections[$this->users[$content['receiver_id']]]->send($msg);
                }
                break;
            case 'invitation':
                if (isset($this->users[$content['receiver_id'] ?? ''])) {
                    $this->connections[$this->users[$content['receiver_id']]]->send($msg);
                }
                if (isset($content['content']) && $content['content'] != "") {
                    $message = $this->negotiation->storeMessage($content['sender_id'], (isset($content['receiver_id']) ? $content['receiver_id'] : NULL), $content['content'], $content['negotiation_id']);
                }
                break;
            case 'attachNegotiation':
                $this->negotiation->attachedNegotiation($content['negotiation_id'], $content['sender_id']);
                $this->negotiations[$content['negotiation_id']] = $content['sender_id'];
                foreach ($this->administration as $agent) {
                    $this->connections[$agent]->send($msg);
                }
                if (isset($this->users[$content['receiver_id']])) {
                    $this->connections[$this->users[$content['receiver_id']]]->send($msg);
                }
                break;
            case 'writing':
                if (isset($this->users[$content['receiver_id']])) {
                    $this->connections[$this->users[$content['receiver_id']]]->send($msg);
                } elseif (isset($this->administration[$content['receiver_id']])) {
                    $this->connections[$this->administration[$content['receiver_id']]]->send($msg);
                }
                break;
            case 'connected':
                $conn->send(json_encode(['users'=>array_keys($this->users),'action'=>'connected']));
                break;
        }
    }
}
