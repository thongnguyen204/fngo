<?php
namespace App\Repositories;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomRepository implements RoomRepositoryInterface{
    public function getRoomType(Room $room)
    {
        return RoomType::where('hotel_id',$room->hotel_id)->get();
    }
    public function store(RoomType $room)
    {
        $room->save();
    }
    public function getAllHotel()
    {
        return Hotel::all();
    }
    
    public function destroy(RoomType $room){
        $temp = $room->hotel;
        $room->delete();
        return $temp;
    }
    public function getRoomByCode($code){
        return RoomType::where('product_code',$code)->first();
    }
}