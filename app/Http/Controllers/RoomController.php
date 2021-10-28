<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomTypeRequest;
use Illuminate\Http\Request;
use \App\Models\Hotel;
use App\Models\RoomType;
use App\Services\RoomServiceInterface;
use DateTime;


class RoomController extends Controller
{
    private $room;

    public function __construct(RoomServiceInterface $room)
    {
        $this->room = $room;
    }
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
    public function create(Hotel $hotel)
    {
        //
        
        return view('admin.hotel.roomType.create')
        ->with('hotel',$hotel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomTypeRequest $request)
    {
        //
        $room = $this->room->store($request);

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
    public function edit(RoomType $room)
    {
        //
        $types = $this->room->getRoomType($room);

        // $hotels = $this->room->getAllHotel();

        return view('admin.hotel.roomType.edit')
        ->with('room',  $room)
        ->with('hotel', $room->hotel)
        ->with('types', $types);

        // return ($room);
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\Response
     */
    public function update(RoomTypeRequest $request, RoomType $room)
    {
        //
        $this->room->update($request,$room);
        return redirect()->route('hotel.show',$room->hotel);

        // return $room;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomType $room)
    {
        //
        
        $temp = $room->hotel;
        $this->room->destroy($room);
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
