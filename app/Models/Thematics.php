<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thematics extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    /**
     * Get the countries associated with the thematic.
     */
    public function countries()
    {
        return $this->hasMany(Thematics_countries::class,'thematic_id');
    }

    /**
     * Get the publishers values associated with the thematic.
     */
    public function publishers()
    {
        return $this->belongsToMany(Publishers::class,'publishers_thematics', 'thematic_id', 'publisher_id');
    }

    /**
     * Get the leads type values associated with the thematic.
     */
    public function costsTypes()
    {
        return $this->belongsToMany(Cost_types::class, 'publishers_cost_types', 'thematic_id', 'cost_type_id')->withPivot(['publisher_id']);
    }

    /**
     * Get the leads type values associated with the thematic.
     */
    public function leadsTypes()
    {
        return $this->belongsToMany(Leads_types::class, 'publishers_leads_types', 'thematic_id', 'lead_type_id')->withPivot(['publisher_id']);
    }

    protected static function booted()
    {
        self::deleting(function($model){
            $model->countries()->delete();
        });
    }
}
