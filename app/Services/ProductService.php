<?php
namespace App\Services;

use App\Models\Receipt;
use App\Models\Receipt_Detail;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductService implements ProductServiceInterface{
    private $product;
    private $tour;
    private $room;
    public function __construct(RoomServiceInterface $room ,TourServiceInterface $tour ,ProductRepositoryInterface $product){
        $this->room = $room;
        $this->product = $product;
        $this->tour = $tour;
    }
    public function getProductByID($id){
        return $this->product->getProductByID($id);
    }
    public function getProductByCode($product_code){
        return $this->product->getProductByCode($product_code);
    }
    
    public function showProductDetail($code){
        if($code[0] == 't')
            return $this->tour->getTourByCode($code);
        else
        return $this->room->getRoomByCode($code);
    }
    
    
}
