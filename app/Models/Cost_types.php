<?php

namespace App\Models;

use App\Traits\Log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost_types extends Model
{
    use HasFactory,Log;

    /**
     * Get the cost types associated with the publisher.
     */
    public function publishers()
    {
        return $this->belongsToMany(Cost_types::class,'publishers_leads_types', 'cost_type_id', 'publisher_id');
    }
}
