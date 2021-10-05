<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Room;

class Hotel extends Model
{
    //
    protected $fillable = [
        'name','category','price_avg'
    ];

    public $timestamps = false;

    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function roomtype()
    {
        return $this->hasMany(RoomType::class);
    }
    public function CityProvince(){
        return $this->belongsTo(CityProvince::class);
    }

}
