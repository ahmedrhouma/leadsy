<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisers extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    /**
     * Get the campaigns associated with the advertiser.
     */
    public function campaigns()
    {
        return $this->hasMany(campaigns::class,'advertiser_id');
    }
    /**
     * Get the publishers associated with the advertiser.
     */
    public function publishers()
    {
        return $this->belongsToMany(campaigns::class, 'campaign_publishers', 'campaign_id', 'publisher_id')->withPivot(['buying_price']);
    }
}
