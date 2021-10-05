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
        $room = new RoomType;
        $room->name = $request->name;
        $room->hotel_id = $request->hotel_id;
        $room->bed = $request->bed_num ."-".$request->bed_type;
        $room->price = $request->price;
        $room->area = $request->area;
        $room->max_person = $request->bed_num  * $request->bed_type;
        if(is_null($request->refund))
            $room->refund = false;
        else
            $room->refund = $request->refund;

        if(is_null($request->breakfast))
            $room->breakfast = false;
        else
            $room->breakfast = $request->breakfast;
        $room->price = $request->price;
        if(!empty($request->file('avatar')))
        {
            $uploadedFileUrl = Cloudinary::upload($request->file('avatar')->getRealPath(),[
                'folder' => 'FnGO/RoomImage',
            ])->getSecurePath();
            $room->avatar =  $uploadedFileUrl;
        }
        $room->save();
        $room->product_code = "hotel_" . $request->hotel_id . "_room_" . $room->id;
        $room->save();

        return $room;
    }
    public function getAllHotel()
    {
        return Hotel::all();
    }
    public function update(Request $request, RoomType $room){
        $room->name = $request->name;
        $room->bed = $request->bed_num ."-".$request->bed_type;
        $room->price = $request->price;
        $room->area = $request->area;
        $room->max_person = $request->bed_num  * $request->bed_type;
        if(is_null($request->refund))
            $room->refund = false;
        else
            $room->refund = $request->refund;

        if(is_null($request->breakfast))
            $room->breakfast = false;
        else
            $room->breakfast = $request->breakfast;
        $room->price = $request->price;
        if(!empty($request->file('avatar')))
        {
            $uploadedFileUrl = Cloudinary::upload($request->file('avatar')->getRealPath(),[
                'folder' => 'FnGO/RoomImage',
            ])->getSecurePath();
            $room->avatar =  $uploadedFileUrl;
        }
        $room->save();

    }
    public function destroy(RoomType $room){
        $temp = $room->hotel;
        $room->delete();
        return $temp;
    }
}