<?php


namespace App\Services;


use App\Models\Negotiations;

class NegotiationService
{
    private $model;

    public function __construct()
    {
        $this->model = Negotiations::class;
    }

    public function storeMessage($sender,$receiver,$content,$negotiation_id){

        $message = ($this->model)::find($negotiation_id)->messages()->create([
            'sender_id' => $sender,
            'receiver_id' => $receiver,
            'message_content' => $content,
            'message_status' => 0,
            'message_sent' => date('Y-m-d H:i:s'),
        ]);
        return $message?$message:false;
    }

    public function openConversation($negotiation_id,$sender_id){
        $message = ($this->model)::find($negotiation_id)->messages()->whereNull('message_read')->where('receiver_id','=',$sender_id)->update([
            'message_read' => date('Y-m-d H:i:s'),
        ]);
        return $message?true:false;
    }

    public function invitePublisher($campaign_id,$sender_id,$receiver_id){
        $negociation = ($this->model)::create(['campaign_id'=>$campaign_id,'part_type'=>Negotiations::PART_TYPE_PUBLISHER,'part_id'=>$receiver_id,'status'=>1,'start_date'=>date('Y-m-d')]);
        return $negociation?true:false;
    }

    public function attachedNegotiation($negotiation_id,$sender_id){
        return ($this->model)::find($negotiation_id)->messages()->whereNull('receiver_id')->update([
            'message_read' => date('Y-m-d H:i:s'),
            'receiver_id' => $sender_id,
        ]);
    }

    public function getCampaign($negotiation_id){
        $campaign = ($this->model)::find($negotiation_id)->campaign;
        return $campaign?$campaign:false;
    }
}
