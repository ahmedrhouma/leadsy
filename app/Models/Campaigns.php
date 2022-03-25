<?php

namespace App\Models;

use App\Helper\Countries;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model
{
    use HasFactory;
    const status = [
        0 => 'Active',
        1 => 'In negotiation',
        2 => 'Finished',
    ];
    protected $guarded = [
        'id'
    ];
    protected $appends = [
        'countriesName'
    ];
    protected $casts= [
        'created_at' => 'datetime:Y-m-d H:i:s'
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
        return $this->belongsToMany(Leads::class, 'campaigns_leads', 'campaign_id', 'lead_id')->withPivot(['rejection_id','sale_status_id','sending_date']);
    }

    /**
     * Get the leads associated with the campaign.
     */
    public function rejections()
    {
        return $this->belongsToMany(Leads::class, 'campaigns_leads', 'campaign_id', 'lead_id')->whereNotNull('rejection_id');
    }

    /**
     * Get the leads associated with the campaign.
     */
    public function sales()
    {
        return $this->belongsToMany(Leads::class, 'campaigns_leads', 'campaign_id', 'lead_id')->where('sale_status_id','=',1);
    }

    /**
     * Get the advertiser associated with the campaign.
     */
    public function advertiser()
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

    /**
     * Get the Costs type associated with the campaign.
     */
    public function campaignPublishers()
    {
        return $this->hasMany(CampaignPublisher::class, 'campaign_id');
    }

    /**
     * Get the Costs type associated with the campaign.
     */
    public function lastCampaignPublisher()
    {
        return $this->hasOne(CampaignPublisher::class, 'campaign_id')->orderByDesc('created_at');
    }
    /**
     * Get the Negotiations associated with the campaign.
     */
    public function negotiations()
    {
        return $this->hasMany(Negotiations::class, 'campaign_id');
    }

    /**
     * Get the Negotiations associated with the campaign.
     */
    public function negotiation()
    {
        return $this->hasOne(Negotiations::class, 'campaign_id');
    }

    /**
     * Get the Negotiations associated with the campaign.
     */
    public function negotiationPublishers()
    {
        return $this->belongsToMany(Publishers::class, Negotiations::class,'campaign_id','part_id')->wherePivot('part_type','=','2')->withPivot(['id']);
    }
    /**
     * Get the Negotiations associated with the campaign.
     */
    public function negotiationAdvertiser()
    {
        return $this->hasOneThrough(Advertisers::class, Negotiations::class,'campaign_id','part_id');
    }

    public function getCountriesNameAttribute(){
        return is_array($this->countries)?array_map(function ($country){
                return Countries::getCountry($country);
            },$this->countries):array_map(function ($country){
                return Countries::getCountry($country);
            },json_decode($this->countries)) ?? null;
    }
}
