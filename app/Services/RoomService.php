<?php
namespace App\Services;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use App\Repositories\RoomRepositoryInterface;

use Illuminate\Http\Request;

class RoomService implements RoomServiceInterface{
    private $room;
    public function __construct(RoomRepositoryInterface $room)
    {
        $this->room = $room;
    }
    public function getRoomType(Room $room)
    {
        return $this->room->getRoomType($room);
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
        $this->room->store($room);
        $room->product_code = "hotel_" . $request->hotel_id . "_room_" . $room->id;
        $this->room->store($room);

        return $room;
    }
    public function getAllHotel()
    {
        $this->room->getAllHotel();
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
        $this->room->store($room);

    }
    public function destroy(RoomType $room){
        return $this->room->destroy($room);
    }
    public function getRoomByCode($code){
        return $this->room->getRoomByCode($code);
    }
}