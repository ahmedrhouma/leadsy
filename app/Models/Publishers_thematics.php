<?php

namespace App\Models;

use App\Helper\Countries;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publishers_thematics extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $appends = [
        'countries_name'
    ];
    public function getCountriesNameAttribute(){
        return Countries::getCountry($this->country) ?? null;
    }
}
