<?php

namespace App\Http\Controllers;

use App\Services\NegotiationService;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class NegociationMessageController extends Controller implements MessageComponentInterface
{
    const ERROR_MESSAGE_STATUS = 401;
    const SUCCESS_MESSAGE_STATUS = 201;


    const ADMIN_ROLE = 1;
    const AGENT_ROLE = 4;
    const ADVERTISER_ROLE = 2;
    const PUBLISHER_ROLE = 3;
    private $connections = [];
    private $users = [];
    private $administration = [];
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
            unset($this->users[$key]);
        }
        if (($key = array_search($conn->resourceId, $this->administration)) !== false) {
            unset($this->administration[$key]);
        }
    }


    function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred with user : {$e->getMessage()}\n";
        if (($key = array_search($conn->resourceId, $this->users)) !== false) {
            unset($this->users[$key]);
        }
        if (($key = array_search($conn->resourceId, $this->administration)) !== false) {
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
                }
                $this->users[$content['user_id']] = $conn->resourceId;
                break;
            case 'message':
                if ($message = $this->negotiation->storeMessage($content['sender_id'], (isset($content['receiver_id']) ? $content['receiver_id'] : NULL), $content['content'], $content['negotiation_id'])) {
                    $content['status'] = self::SUCCESS_MESSAGE_STATUS;
                    $content['message_sent'] = $message->message_sent;
                    $conn->send(json_encode($content));
                    if (in_array($content['role'], [self::ADVERTISER_ROLE, self::PUBLISHER_ROLE])) {
                        if (!isset($content['receiver_id']) || !isset($this->administration[$content['receiver_id']])) {
                            $campaign = $this->negotiation->getCampaign($content['negotiation_id']);
                            $content['campaign'] = $campaign;
                            $content['action'] = 'assigned';
                            foreach ($this->administration as $agent) {
                                $this->connections[$agent]->send(json_encode($content));
                            }
                        } else {
                            $this->connections[$this->administration[$content['receiver_id']]]->send(json_encode($content));
                        }
                    } else if (isset($this->users[$content['receiver_id']])) {
                        $this->connections[$this->users[$content['receiver_id']]]->send(json_encode($content));
                    }
                } else {
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
                //$this->negotiation->invitePublisher($content['negotiation_id'],$content['sender_id'],$content['receiver_id']);
                if (isset($content['content']) && $content != "") {
                    if ($message = $this->negotiation->storeMessage($content['sender_id'], (isset($content['receiver_id']) ? $content['receiver_id'] : NULL), $content['content'], $content['negotiation_id'])) {
                        $content['status'] = self::SUCCESS_MESSAGE_STATUS;
                        if (isset($this->users[$content['receiver_id']])) {
                            $this->connections[$this->users[$content['receiver_id']]]->send(json_encode($content));
                        }
                    } else {
                        $conn->send(json_encode([
                            'action' => 'message',
                            'sender_id' => $content['sender_id'],
                            'status' => self::ERROR_MESSAGE_STATUS
                        ]));
                    }
                }
                if (isset($this->users[$content['receiver_id'] ?? ''])) {
                    $this->connections[$this->users[$content['receiver_id']]]->send($msg);
                }
                break;
            case 'attachNegotiation':
                $this->negotiation->attachedNegotiation($content['negotiation_id'], $content['sender_id']);
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
        }
    }
}
