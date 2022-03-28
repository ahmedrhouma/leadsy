<?php

namespace App\Models;

use App\Traits\Log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignPublisher extends Model
{
    use HasFactory,Log;
    protected $guarded = [
        'id'
    ];

    /**
     * Get the publisher associated.
     */
    public function publisher()
    {
        return $this->belongsTo(Publishers::class,  'publisher_id');
    }
    /**
     * Get the campaign associated .
     */
    public function campaign()
    {
        return $this->belongsTo(Campaigns::class,  'campaign_id');
    }

    /**
     * Get the leads associated .
     */
    public function leads()
    {
        return $this->hasMany(CampaignsLeads::class,  'campaign_id','campaign_id');
    }
}
