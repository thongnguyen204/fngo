<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Room;
use \App\Models\Hotel;
use App\Models\RoomType;
use DateTime;
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
    public function create(Room $room)
    {
        //
        $types = RoomType::where('hotel_id',$room->hotel_id)->get();
        return view('admin.room.create')->with('room',$room)
        ->with('types',$types);
        // return $types;
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
        $room->type_id = $request->type_id;
        $room->description = $request->description;
        $room->save();
        return redirect()->route('hotel.show',$room->hotel);
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
        $types = RoomType::where('hotel_id',$room->hotel_id)->get();
        $hotels = Hotel::all();
        return view('admin.room.edit')->with('room',$room)
        ->with('hotels',$hotels)
        ->with('types',$types);
        
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
        
        $room->room_number = $request->room_number;
        $room->hotel_id = $request->hotel_id;
        $room->type_id = $request->type_id;
        $room->available = $request->available;
        $room->description = $request->description;
        $room->save();
        return redirect()->route('hotel.show',$room->hotel);
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
    public function test()
    {
        return 'test';
    }
    public function order(Request $request)
    {
        //
        $arrive = DateTime::createFromFormat('Y-m-d',
            $request->arrive);
        $checkout = DateTime::createFromFormat('Y-m-d',
            $request->checkout);
        $this->test();
    }
}
