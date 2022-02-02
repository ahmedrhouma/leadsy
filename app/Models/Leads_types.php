<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads_types extends Model
{
    use HasFactory;

    /**
     * Get the leads type associated with the publisher.
     */
    public function publishers()
    {
        return $this->belongsToMany(Leads_types::class,'publishers_leads_types', 'lead_type_id', 'publisher_id');
    }
}
