<?php

namespace App\Models;

use App\Traits\Log;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negotiations extends Model
{
    use HasFactory,Log;
    protected $guarded = [
        'id'
    ];

    public $timestamps = false;

    const  PART_TYPE_ADVERTISER = 1;
    const  PART_TYPE_PUBLISHER = 2;

    protected static function booted(){
        static::addGlobalScope('belongs_to_user',function (Builder $builder){
          if (session()->has('account_id') && session('profile', User::ADMIN_PROFILE) != User::ADMIN_PROFILE) {
              $builder->where([
                  'part_id' => session('account_id'),
                  'part_type' => session('profile') == User::ADVERTISER_PROFILE?self::PART_TYPE_ADVERTISER:self::PART_TYPE_PUBLISHER,
              ]);
          }
        });
    }

    public function messages()
    {
        return $this->hasMany(NegotiationMessage::class, 'negotiation_id');
    }

    public function lastMessage()
    {
        return $this->hasOne(NegotiationMessage::class, 'negotiation_id')->orderBy('id', 'desc');
    }

    public function unreadMessages()
    {
        return $this->hasMany(NegotiationMessage::class, 'negotiation_id')->whereNull('message_read');
    }

    public function publisher()
    {
        return $this->belongsTo(Publishers::class,'part_id');
    }

    public function advertiser()
    {
        return $this->belongsTo(Advertisers::class,'part_id');
    }

    public function campaign()
    {
        return $this->belongsTo(Campaigns::class,'campaign_id');
    }
}
