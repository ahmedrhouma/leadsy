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
        'countries_name'
    ];
    public function getCountriesNameAttribute(){
        return json_decode($this->countries) ?? null;
    }

}
