<?php

namespace App\Models;

use App\Traits\Log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisers extends Model
{
    use HasFactory,Log;
    protected $guarded = [
        'id'
    ];

    /**
     * Get the campaigns associated with the advertiser.
     */
    public function campaigns()
    {
        return $this->hasMany(Campaigns::class,'advertiser_id');
    }
     /**
     * Get the user associated with the advertiser.
     */
    public function user()
    {
        return $this->hasOne(User::class,'account_id')->where('profile','2');
    }
    /**
     * Get the publishers associated with the advertiser.
     */
    public function publishers()
    {
        return $this->belongsToMany(Campaigns::class, 'campaign_publishers', 'campaign_id', 'publisher_id')->withPivot(['buying_price']);
    }
    /**
     * Get the publishers associated with the advertiser.
     */
    public function negotiations()
    {
        return $this->hasMany(Negotiations::class, 'part_id')->where('part_type',Negotiations::PART_TYPE_ADVERTISER);
    }
}
