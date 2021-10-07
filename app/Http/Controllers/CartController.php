<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Tour;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;

use Session;

class CartController extends Controller
{
    public function Tour(Request $request,Tour $product)
    {
        if($product != null)
            {
                $oldCart = Session('Cart') ? Session('Cart') : null;
                $newCart = new Cart($oldCart);
                $newCart->addCart($product,$product->product_code);
                
                $request->session()->put('Cart',$newCart);

                return __('cart.Success');
            }
            else{
                return __('cart.Fail');
            }
    }
    public function Hotel(Request $request,RoomType $product)
    {
        if($product != null)
            {
                $oldCart = Session('Cart') ? Session('Cart') : null;
                $newCart = new Cart($oldCart);

                $product->product_code .= "_".$request->day;
                $product->price *= $request->day;
                
                $newCart->addCart($product,$product->product_code);
                
                $request->session()->put('Cart',$newCart);

                return __('cart.Success');
            }
            else{
                return __('cart.Fail');
            }
    }
    /**
     * Add a product to cart
     *
     * @param String $product_code
     */
    public function TourAddCart(Request $request, $product_code){
        if($product_code != null){
            if(strpos($product_code,'tour')!==false)
            {
                $product = Tour::where('product_code',$product_code)->first();
                return $this->Tour($request,$product);
            }
            else if(strpos($product_code,'hotel')!==false)
            {
                $product = RoomType::where('product_code',$product_code)->first();
                return $this->Hotel($request,$product);
                
            }
        }
        return __('cart.Fail');
        // return $product_code;
    }

    


    public function getCurrentCartQuantity()
    {
        return Session('Cart')->quantity;
    }

    public function deleteCart(Request $request, $product_code){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteCart($product_code);

        if(Count($newCart->products)>0)
            $request->session()->put('Cart',$newCart);
        else
            $request->session()->forget('Cart',$newCart); 
        return view('cart.body')->with('noti',__('cart.Deleted'));
    }

    public function updateCart(Request $request)
    {
        // dd($request->data);
        $data = $request->data;
        foreach($data as $item){
            $oldCart = Session('Cart') ?  Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->updateCart($item["key"],$item['value']);

            $request->session()->put('Cart',$newCart);
        }
        
        return view('cart.body')->with('noti',__('cart.Update'));
    }
    public function checkoutCart(Request $request)
    {
        $data = $request->data;
        
    }











    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $newCart = session('Cart');
        return view('cart.index')->with('newCart',$newCart);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
