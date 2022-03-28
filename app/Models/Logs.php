<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;
    const ADVERTISER = 1;
    const PUBLISHER = 2;
    const CAMPAIGN = 3;
    const LEADS = 4;
    const LEADS_TYPE = 5;
    const COSTS_TYPE = 6;
    const NEGOTIATIONS = 7;
    const PUBLISHER_COST_TYPE = 8;
    const PUBLISHER_LEADS_TYPE = 9;
    const PUBLISHER_THEMATICS = 10;
    const USER = 11;
    const MODELS = [
        self::ADVERTISER => Advertisers::class,
        self::PUBLISHER => Publishers::class,
        self::CAMPAIGN => Campaigns::class,
        self::LEADS => Leads::class,
        self::LEADS_TYPE => Leads_types::class,
        self::COSTS_TYPE => Cost_types::class,
        self::NEGOTIATIONS => Negotiations::class,
        self::PUBLISHER_COST_TYPE => Publishers_cost_types::class,
        self::PUBLISHER_LEADS_TYPE => Publishers_leads_types::class,
        self::PUBLISHER_THEMATICS => Publishers_thematics::class,
        self::USER => User::class,
    ];
    const  ACTIONS = [
        'create' => 1,
        'edit' => 2,
        'delete' => 3,
    ];
}
