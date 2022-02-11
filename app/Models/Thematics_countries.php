<?php

namespace App\Models;

use App\Helper\Countries;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thematics_countries extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $appends = [
        'countryName'
    ];
    public function getCountryNameAttribute(){
        return \App\Helper\Countries::getCountry($this->country) ?? null;
    }

}
