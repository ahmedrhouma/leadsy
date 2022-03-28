<?php

namespace App\Models;

use App\Traits\Log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publishers_cost_types extends Model
{
    use HasFactory,Log;
    protected $guarded = [
        'id'
    ];
}
