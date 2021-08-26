<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hotels = Hotel::paginate(10);
        return view('hotel.index')->with('hotels',$hotels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hotel.create');
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
        $hotel = new Hotel;
        $hotel->name = $request->name;
        $hotel->price_avg = $request->avg_price;
        $hotel->save();
        return redirect()->route('hotel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
        $rooms = Room::where('hotel_id',$hotel->id)->paginate(10);
        return view('room.index')->with('rooms',$rooms);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
        return view('hotel.edit')->with('hotel',$hotel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Hotel $hotel)
    {
        //
        $hotel->name =  $request->name;
        $hotel->price_avg =  $request->avg_price;
        $hotel->save();
        return redirect()->route('hotel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        //
        $rooms = $hotel->room;
        foreach ($rooms as $room) {
            $room->delete();
        }
        $hotel->delete();
        return redirect()->route('hotel.index');
    }
    public function quantity()
    {
        $quantity = Hotel::count();
        return $quantity;
    }
}
