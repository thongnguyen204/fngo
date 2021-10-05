<?php
namespace App\Repositories;

use App\Models\CityProvince;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class HotelRepository implements HotelRepositoryInterface
{
    public function all(){
        return Hotel::paginate(12);
    }
    public function search($keyword)
    {
        return Hotel::where('name','like','%'.$keyword.'%')
            ->paginate(12);
    }
    public function store(Request $request){
        $hotel = new Hotel;
        $hotel->name = $request->name;
        $hotel->price = $request->price;
        $hotel->address = $request->address;
        if(!empty($request->file('avatar')))
        {
            $uploadedFileUrl = Cloudinary::upload($request->file('avatar')->getRealPath(),[
                'folder' => 'FnGO/HotelImage',
            ])->getSecurePath();
            $hotel->avatar =  $uploadedFileUrl;
        }
        $hotel->save();  
    }
    
    public function delete($id){
        Hotel::destroy($id);
    }
    public function show($id){
        
        $hotel = Hotel::find($id)->first();
        return $hotel;
    }
    public function update(Request $request, Hotel $hotel){
        $hotel->name =  $request->name;
        $hotel->price =  $request->price;
        $hotel->address = $request->address;
        if(!empty($request->file('avatar')))
        {
            $uploadedFileUrl = Cloudinary::upload($request->file('avatar')->getRealPath(),[
                'folder' => 'FnGO/HotelImage',
            ])->getSecurePath();
            $hotel->avatar =  $uploadedFileUrl;
        }
        $hotel->save();
    }
    public function getAllCityProvince()
    {
        return CityProvince::all();
    }
}