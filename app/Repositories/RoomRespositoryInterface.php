<?php
namespace App\Repositories;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

interface RoomRespositoryInterface{
    public function getRoomType(Room $room);
    public function store(Request $request);
    public function getAllHotel();
    public function update(Request $request, RoomType $room);
    public function destroy(RoomType $room);
}