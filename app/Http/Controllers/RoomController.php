<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomTypeRequest;
use App\Models\RoomType;
use App\Services\RoomServiceInterface;
use Illuminate\Http\Request;
use \App\Models\Hotel;

class RoomController extends Controller
{
    private $room;

    public function __construct(RoomServiceInterface $room)
    {
        $this->room = $room;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Hotel $hotel)
    {
        return view('admin.hotel.roomType.create')
            ->with('hotel', $hotel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomTypeRequest $request)
    {
        $room = $this->room->store($request);
        return redirect()->route('hotel.show', $room->hotel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\RoomType $room
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomType $room)
    {
        $types = $this->room->getRoomType($room);

        return view('admin.hotel.roomType.edit')
            ->with('room', $room)
            ->with('hotel', $room->hotel)
            ->with('types', $types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\RoomType $room
     * @return \Illuminate\Http\Response
     */
    public function update(RoomTypeRequest $request, RoomType $room)
    {
        $this->room->update($request, $room);
        return redirect()->route('hotel.show', $room->hotel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\RoomType $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomType $room)
    {
        $temp = $room->hotel;
        $this->room->destroy($room);
        return redirect()->route('hotel.show', $temp);
    }
}
