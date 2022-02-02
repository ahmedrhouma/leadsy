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
        return $this->hasMany(thematics_countries::class,'thematic_id');
    }

    /**
     * Get the publishers values associated with the thematic.
     */
    public function publishers()
    {
        return $this->belongsToMany(Publishers::class,'publishers_thematics', 'thematic_id', 'publisher_id');
    }

    protected static function booted()
    {
        self::deleting(function($model){
            $model->countries()->delete();
        });
    }
}
