<?php
namespace App\Repositories;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomRespository implements RoomRespositoryInterface{
    public function getRoomType(Room $room)
    {
        return RoomType::where('hotel_id',$room->hotel_id)->get();
    }
    public function store(Request $request)
    {
        $room = new Room;
        $room->room_number = $request->room_number;
        $room->hotel_id = $request->hotel_id;
        $room->type_id = $request->type_id;
        $room->description = $request->description;
        $room->save();

        return $room;
    }
    public function getAllHotel()
    {
        return Hotel::all();
    }
    public function update(Request $request, Room $room){
        $room->room_number = $request->room_number;
        $room->hotel_id = $request->hotel_id;
        $room->type_id = $request->type_id;
        $room->available = $request->available;
        $room->description = $request->description;
        $room->save();
    }
    public function destroy(Room $room){
        $temp = $room->hotel;
        $room->delete();
        return $temp;
    }
}