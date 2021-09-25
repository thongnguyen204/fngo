<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    //
    protected $fillable = [
        'title','content','tour_code',
        'price','day_start','place_start',
        'space_available','time_start',
        'day_number'
    ];
    public function subTour()
    {
        return $this->hasMany(SubTour::class);
    }
}
