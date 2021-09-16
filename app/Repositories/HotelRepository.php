<?php
namespace App\Repositories;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class HotelRepository implements HotelRepositoryInterface
{
    public function all(){
        return Hotel::paginate(10);
    }
    public function store(Request $request){
        $hotel = new Hotel;
        $hotel->name = $request->name;
        $hotel->price_avg = $request->avg_price;
        $hotel->save();
    }
    
    public function delete($id){
        Hotel::destroy($id);
    }
    public function show($id){
        if(Auth::user()->role_id == 1)
            $rooms = Room::where('hotel_id',$id)->paginate(10);
        else if (Auth::user()->role_id == 2)
        $rooms = Room::where('hotel_id',$id)
            ->where('available', 1)
            ->paginate(10);
        return $rooms;
    }
    public function update(Request $request, Hotel $hotel){
        $hotel->name =  $request->name;
        $hotel->price_avg =  $request->avg_price;
        $hotel->save();
    }
}