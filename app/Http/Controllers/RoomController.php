<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Room;
use \App\Models\Hotel;
use phpDocumentor\Reflection\Types\Integer;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $hotels = Hotel::all();
        return view('admin.room.create')->with('hotels',$hotels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $room = new Room;
        $room->room_number = $request->room_number;
        $room->hotel_id = $request->hotel_id;
        $room->type = $request->type;
        $room->max_person = $request->max_person;
        $room->price_per_night = $request->price_per_night;
        $room->description = $request->description;
        $room->save();
        return redirect()->route('room.show',$room->hotel_id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Room $room
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
        $hotels = Hotel::all();
        return view('admin.room.edit')->with('room',$room)
        ->with('hotels',$hotels);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
        
        $temp = $room->hotel_id ;
        $room->room_number = $request->room_number;
        $room->hotel_id = $request->hotel_id;
        $room->type = $request->type;
        $room->max_person = $request->max_person;
        $room->price_per_night = $request->price_per_night;
        $room->description = $request->description;
        $room->save();
        return redirect()->route('room.show',$temp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
        $temp = $room->hotel;
        
        $room->delete();
        return redirect()->route('hotel.show',$temp);
    }
}
