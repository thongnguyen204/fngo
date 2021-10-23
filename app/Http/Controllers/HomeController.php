<?php

namespace App\Http\Controllers;

use App\Services\ArticleServiceInterface;
use App\Services\HotelServiceInterface;
use App\Services\RoomServiceInterface;
use App\Services\TourServiceInterface;


class HomeController extends Controller
{
    private $tour;
    private $room;
    private $hotel;
    private $article;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        ArticleServiceInterface $article,
        RoomServiceInterface    $room,
        TourServiceInterface    $tour,
        HotelServiceInterface   $hotel
        )
    {
        // $this->middleware('auth');
        $this->article  = $article;
        $this->tour     = $tour;
        $this->room     = $room;
        $this->hotel    = $hotel;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $top4tour    = $this->tour->getTopPurchases(4);
        $top4room    = $this->room->getTopPurchases(4);
        $top4hotel   = $this->hotel->getTopPurchases(4);
        $top4article = $this->article->getTopArticle(4);
        
        return view('home')
        ->with('topTour',   $top4tour)
        ->with('topRoom',   $top4room)
        ->with('topHotel',  $top4hotel)
        ->with('topArticle',$top4article);
    }
}
