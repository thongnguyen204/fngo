<?php

namespace App\Http\Controllers;

use App\Services\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    public function __construct(ProductServiceInterface $product)
    {
        $this->product = $product;
    }
    //
    public function showProduct($code){
        return $this->product->showProductDetail($code);
    }
}
