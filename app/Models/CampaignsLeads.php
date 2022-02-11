<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignsLeads extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    /**
     * Get the saleStatus associated with the campaign.
     */
    public function saleStatus()
    {
        return $this->belongsTo(SaleStatuses::class, 'sale_status_id');
    }
    /**
     * Get the rejection associated with the campaign.
     */
    public function rejection()
    {
        return $this->belongsTo(Rejections::class, 'rejection_id');
    }

    /**
     * Get the saleStatus associated with the campaign.
     */
    public function lead()
    {
        return $this->belongsTo(Leads::class, 'lead_id');
    }
    /**
     * Get the rejection associated with the campaign.
     */
    public function campaign()
    {
        return $this->belongsTo(campaigns::class, 'campaign_id');
    }
}
