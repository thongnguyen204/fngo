<?php
namespace App\Repositories;

use App\Models\Room;
use Illuminate\Http\Request;

interface RoomRespositoryInterface{
    public function getRoomType(Room $room);
    public function store(Request $request);
    public function getAllHotel();
    public function update(Request $request, Room $room);
    public function destroy(Room $room);
}