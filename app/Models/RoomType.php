<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class RoomType extends Model
{
    //
    protected $fillable = [
        'name','hotel_id','max_person','price_per_night'
    ];
    public $timestamps = false;

    public function room()
    {
        return $this->hasMany(Room::class);
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
