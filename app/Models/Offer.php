<?php

namespace App\Models;

use App\Helper\Countries;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $guarded=[
        'id'
    ];
    protected $appends = [
        'countries_details'
    ];
    protected $casts = [
        'countries' => 'json'
    ];

    public function getCountriesDetailsAttribute(){
        return array_map(function ($iso){
            return ['iso' => $iso,'name'=>Countries::getCountry($iso)];
            },json_decode($this->countries));
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
