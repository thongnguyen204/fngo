<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubTrip extends Model
{
    //
    public $timestamps = false;

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
    
}
