<?php
namespace App\Services;

use App\Models\Hotel;
use App\Models\Products;
use App\Models\Room;
use App\Models\RoomType;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\RoomRepositoryInterface;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class RoomService implements RoomServiceInterface{
    private $room;
    private $product;
    public function __construct(ProductRepositoryInterface $product,RoomRepositoryInterface $room)
    {
        $this->product = $product;
        $this->room = $room;
    }
    public function getRoomType(RoomType $room)
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
        // asgin this room to a temp product already seeded in db
        $room->product_code = "temp";
        $this->room->store($room);

        // create a new product 
        $product1 = new Products;
        $product1->avatar = $room->avatar;
        $product1->product_code = "hotel_" .$room->hotel->id ."_room_".$room->id;
        $product1->name = $room->name;
        $this->product->save($product1);

        // asign room to new product
        $room->product_code = $product1->product_code;
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