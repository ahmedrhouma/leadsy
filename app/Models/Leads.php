<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    /**
     * Get the Campaigns associated with the campaign.
     */
    public function campaigns()
    {
        return $this->belongsToMany(campaigns::class, 'campaigns_leads', 'lead_id', 'campaign_id')->withPivot(['rejection','sale_status','sending_date']);
    }

    /**
     * Get the Publisher associated with the campaign.
     */
    public function publisher()
    {
        return $this->belongsTo(Publishers::class, 'publisher_id');
    }

}
