<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    public function subTrip()
    {
        return $this->belongsToMany(SubTrip::class,'trip_subtrips','trip_id','subTrip_id');
    }
}
