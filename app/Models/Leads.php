<?php

namespace App\Models;

use App\Traits\Log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory,Log;
    protected $guarded = [
        'id'
    ];

    /**
     * Get the Campaigns associated with the campaign.
     */
    public function campaigns()
    {
        return $this->belongsToMany(Campaigns::class, 'campaigns_leads', 'lead_id', 'campaign_id')->withPivot(['rejection_id','sale_status_id','sending_date']);
    }

    /**
     * Get the Publisher associated with the campaign.
     */
    public function publisher()
    {
        return $this->belongsTo(Publishers::class, 'publisher_id');
    }

}
