<?php
namespace App\Services;

use App\Models\CityProvince;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Repositories\HotelRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class HotelService implements HotelServiceInterface
{
    private $hotel;
    public function __construct(HotelRepositoryInterface $hotel)
    {
        $this->hotel = $hotel;
    }
    public function all(){
        return $this->hotel->all();
    }
    public function search($keyword)
    {
        return $this->hotel->search($keyword);
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
        $this->hotel->store($hotel);  
    }
    
    public function delete($id){
        $this->hotel->delete($id);
    }
    public function show($id)
    {
        return $this->hotel->show($id);
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
        $this->hotel->store($hotel);
    }
    public function getAllCityProvince()
    {
        return $this->hotel->getAllCityProvince();
    }
}