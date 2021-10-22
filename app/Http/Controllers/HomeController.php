<?php

namespace App\Http\Controllers;

use App\Services\RoomServiceInterface;
use App\Services\TourServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $tour;
    private $room;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RoomServiceInterface $room,TourServiceInterface $tour)
    {
        // $this->middleware('auth');
        $this->tour = $tour;
        $this->room = $room;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $top4tour = $this->tour->getTopPurchases(4);
        $top4room = $this->room->getTopPurchases(4);
        
        return view('home')
        ->with('topTour',$top4tour)
        ->with('topRoom',$top4room);
    }
}
