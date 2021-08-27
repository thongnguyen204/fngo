<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = [
        'name','category','price_avg'
    ];

    public $timestamps = false;

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
    public function ht_booking(){
        return $this->belongsTo(ht_booking::class);
    }

}
