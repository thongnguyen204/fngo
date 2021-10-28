<?php
namespace App\Services;

use App\Models\CityProvince;
use App\Models\Hotel;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Repositories\HotelRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Auth;

class HotelService implements HotelServiceInterface
{   
    private $product;
    private $hotel;
    public function __construct(ProductRepositoryInterface $product,HotelRepositoryInterface $hotel)
    {
        $this->product  = $product;
        $this->hotel    = $hotel;
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
        $hotel->category_id = 1;
        $hotel->city_province_id = $request->cityProvince;

        if(!empty($request->file('avatar')))
        {
            $uploadedFileUrl = Cloudinary::upload($request->file('avatar')->getRealPath(),[
                'folder' => 'FnGO/HotelImage',
            ])->getSecurePath();
            $hotel->avatar =  $uploadedFileUrl;
        }
        
        // asgin this hotel to a temp product already seeded in db
        $hotel->product_code = "temp";
        $this->hotel->store($hotel); 
        
        // create a new product 
        $product1 = new Products;
        $product1->avatar = $hotel->avatar;
        $product1->product_code = "hotel_" .$hotel->id;
        $product1->category_id = 1;
        $product1->name = $hotel->name;
        $this->product->save($product1);

        // asign hotel to new product
        $hotel->product_code = $product1->product_code;
        $this->hotel->store($hotel); 
    }
    
    public function delete(Hotel $hotel)
    {
        $product_id = $this->product->getProductByCode($hotel->product_code)->id;
        $this->product->destroy($product_id);
        // $this->hotel->delete($id);
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
    public function getTopPurchases($number)
    {
        return $this->hotel->getTopPurchases($number);
    }
    public function searchAndSort($keyword,$sort_type){
        return $this->hotel->searchAndSort($keyword,$sort_type);
    }
    public function searchPlace($place_id)
    {
        return $this->hotel->searchPlace($place_id);
    }
}