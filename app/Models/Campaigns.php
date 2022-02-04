<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class campaigns extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    /**
     * Get the publishers associated with the campaign.
     */
    public function publishers()
    {
        return $this->belongsToMany(Publishers::class, 'campaign_publishers', 'campaign_id', 'publisher_id')->withPivot(['buying_price']);
    }
    /**
     * Get the leads associated with the campaign.
     */
    public function leads()
    {
        return $this->belongsToMany(Leads::class, 'campaigns_leads', 'campaign_id', 'lead_id')->withPivot(['rejection','sale_status','sending_date']);
    }
    /**
     * Get the campaigns associated with the campaign.
     */
    public function advertisers()
    {
        return $this->belongsTo(Advertisers::class, 'advertiser_id');
    }

    /**
     * Get the thematics associated with the campaign.
     */
    public function thematics()
    {
        return $this->belongsTo(Thematics::class, 'thematic_id');
    }

    /**
     * Get the leads type associated with the campaign.
     */
    public function leadsTypes()
    {
        return $this->belongsTo(Leads_types::class, 'leads_type_id');
    }

    /**
     * Get the Costs type associated with the campaign.
     */
    public function costsTypes()
    {
        return $this->belongsTo(Cost_types::class, 'cost_type_id');
    }
}
