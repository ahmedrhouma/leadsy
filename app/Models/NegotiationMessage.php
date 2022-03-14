<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NegotiationMessage extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $casts= [
        'message_sent' => 'datetime'
    ];
    public $timestamps = false;

    public function sender(){
        return $this->belongsTo(User::class,'sender_id');
    }

}
