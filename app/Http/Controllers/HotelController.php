<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $role = Auth::user()->role->name;
        // return $role;
        $view = $role . ".hotel.index";
        return view($view)->with('hotels',$hotels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.hotel.create');
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
        if(Auth::user()->role_id == 1)
            $rooms = Room::where('hotel_id',$hotel->id)->paginate(10);
        else if (Auth::user()->role_id == 2)
        $rooms = Room::where('hotel_id',$hotel->id)
            ->where('available', 1)
            ->paginate(10);
        $role = Auth::user()->role->name;
        // return $role;
        $view = $role . ".room.index";
        return view($view)->with('rooms',$rooms);
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
        return view('admin.hotel.edit')->with('hotel',$hotel);
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
