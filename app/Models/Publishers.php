<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publishers extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    /**
     * Get the leads associated with the publisher.
     */
    public function leads()
    {
        return $this->hasMany(Leads::class, 'publisher_id');
    }

    /**
     * Get the thematics associated with the publisher.
     */
    public function thematics()
    {
        return $this->belongsToMany(Thematics::class, 'publishers_thematics', 'publisher_id', 'thematic_id')->withPivot(['countries', 'unit_price', 'sale_percentage']);
    }

    /**
     * Get the leads type associated with the publisher.
     */
    public function leadsTypes()
    {
        return $this->belongsToMany(Leads_types::class, 'publishers_leads_types', 'publisher_id', 'lead_type_id');
    }

    /**
     * Get the cost types associated with the publisher.
     */
    public function costsTypes()
    {
        return $this->belongsToMany(Cost_types::class, 'publishers_cost_types', 'publisher_id', 'cost_type_id');
    }

    /**
     * Get the campaigns associated with the publisher.
     */
    public function campaigns()
    {
        return $this->belongsToMany(Campaigns::class, 'campaign_publishers', 'publisher_id', 'campaign_id')->withPivot(['buying_price']);
    }

    /**
     * Get the campaigns associated with the publisher.
     */
    public function negotiations()
    {
        return $this->hasMany(Negotiations::class, 'part_id')->where('part_type',Negotiations::PART_TYPE_PUBLISHER);
    }

    /**
     * Get the user associated with the advertiser.
     */
    public function user()
    {
        return $this->hasOne(User::class,'account_id')->where('profile','3');
    }
    /**
     * Get the landing associated with the advertiser.
     */
    public function landings()
    {
        return $this->hasMany(LandingPages::class,'publisher_id');
    }

    protected static function booted()
    {
        self::deleting(function ($model) {
            $model->thematics()->detach();
            $model->leadsTypes()->detach();
            $model->costsTypes()->detach();
            $model->user()->delete();
        });
    }
}
