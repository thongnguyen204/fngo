<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    private $products = null;
    private $totalPrice = 0;
    private $quantity = 0;

    public function __construct($cart)
    {
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->quantity = $cart->quantity;
        }
    }

    public function addCart($product, $id){
        $newProduct = ['quantity' => 0,'price'=>$product->price, 'productInfo' => $product];
        if($this->products){
            if(array_key_exists($id,$this->products))
                $newProduct = $this->products[$id];
        }
        $newProduct['quantity']++;
        $newProduct['price'] = $newProduct['quantity'] * $product->price;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->price;
        $this->quantity++;
    }
}
