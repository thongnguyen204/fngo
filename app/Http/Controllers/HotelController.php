<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Services\CommentServiceInterface;
use App\Services\HotelServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{

    private $hotel;
    private $comment;

    public function __construct(
        CommentServiceInterface $comment,
        HotelServiceInterface $hotel
        )
    {
        $this->comment = $comment;
        $this->hotel = $hotel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->search)
            $hotels = $this->hotel->search($request->search);
            
        else
            $hotels = $this->hotel->all();

        if(Auth::user() == null)
            $role = 'user';
        else{
            $role = Auth::user()->role->name;
        }
        
        $view = $role . ".hotel.index";
        
        return view($view)
        ->with('hotels',$hotels);
        // dd($hotels);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $CityProvince = $this->hotel->getAllCityProvince();
        
        return view('admin.hotel.create')
        ->with('cty_province',$CityProvince);
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
        $this->hotel->store($request);
        
        return redirect()->route('hotel.index');
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $hotel this is hotel id
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function show($hotel)
    {
        //
        $hotel1 = $this->hotel->show($hotel);

        if(Auth::user() == null)
            $role = 'user';
        else{
            $role = Auth::user()->role->name;
        }
        $comments = $this->comment->getAllCommentsOfProduct($hotel1->product_code);
        
        // convert comments json to plain old PHP array
        $array = json_decode($comments,true);
        
        // check array have comment or not
        $have_comment = true;
        if(!$array)
            $have_comment = false;

        $view = $role . ".hotel.detail";
        
        // return $comments;
        return view($view)
        ->with('comments',      $comments) // json
        ->with('have_comment',  $have_comment)
        ->with('hotel',         $hotel1);
        // return $hotel1;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
        $CityProvince = $this->hotel->getAllCityProvince();
        
        return view('admin.hotel.edit')
        ->with('hotel',         $hotel)
        ->with('cty_province',  $CityProvince);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Hotel $hotel)
    {
        //
        $this->hotel->update($request,$hotel);
        
        return redirect()->route('hotel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        //
        $this->hotel->delete($hotel->id);
        
        return redirect()->route('hotel.index');
    }
    public function quantity()
    {
        $quantity = Hotel::count();
        
        return $quantity;
    }
}
