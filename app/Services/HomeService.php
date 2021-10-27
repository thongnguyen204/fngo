<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;

class HomeService implements HomeServiceInterface{
    private $hotel;
    private $tour;
    private $article;

    public function __construct
    (
        HotelServiceInterface   $hotel,
        TourServiceInterface    $tour,
        ArticleServiceInterface $article
    )
    {
        $this->hotel = $hotel;
        $this->tour = $tour;
        $this->article = $article;
    }
    public function search($request)
    {
        if(Auth::user() == null)
            $role = 'user';
        else{
            $role = 'admin';
        }
        $searchOptions = $request->searchOptions;

        if($searchOptions == 'hotel')
        {
            $hotels = $this->hotel->search($request->search);

            $view = $role . ".hotel.index";
        
            return view($view)
            ->with('hotels',$hotels);
        }

        if($searchOptions == 'tour')
        {
            $tours = $this->tour->search($request->search);

            $view = $role . ".tour.index";
        
            return view($view)
            ->with('trips',$tours);
        }

        if($searchOptions == 'article')
        {
            $articles = $this->article->search($request->search);

            $view = "article.index";
        
            return view($view)
            ->with('articles',$articles);
        }
            
    }
}