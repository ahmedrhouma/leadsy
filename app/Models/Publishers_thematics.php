<?php

namespace App\Models;

use App\Helper\Countries;
use App\Traits\Log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publishers_thematics extends Model
{
    use HasFactory, Log;
    protected $guarded = [
        'id'
    ];
    protected $appends = [
        'countries_details'
    ];
    protected $casts = [
        'countries' => 'json'
    ];

    public function getCountriesNameAttribute()
    {
        return Countries::getCountry($this->countries) ?? null;
    }

    public function getCountriesDetailsAttribute()
    {
        return array_map(function ($iso) {
            return ['iso' => $iso, 'name' => Countries::getCountry($iso)];
        }, $this->countries);
    }

}
