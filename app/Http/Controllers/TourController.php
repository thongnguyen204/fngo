<?php

namespace App\Http\Controllers;

use App\Http\Requests\TourRequest;
use App\Models\Tour;
use App\Models\Trip;
use App\Services\TourServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    private $tour;

    public function __construct(TourServiceInterface $tour)
    {
        $this->tour = $tour;
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
            $trips = $this->tour->search($request->search);
        else
            $trips = $this->tour->all();

        if(Auth::user() == null)
            $role = 'user';
        else{
            $role = Auth::user()->role->name;
        }

        $view = $role . ".tour.index";

        return view($view)->with('trips',$trips);
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tour.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TourRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TourRequest $request)
    {
        //
        $this->tour->store($request);
        return redirect()->route('tour.index');
        // return 'ok';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $trip)
    {
        //
        if(Auth::user() == null)
            $role = 'user';
        else{
            $role = Auth::user()->role->name;
        }

        $view = $role . ".tour.detail";
        return view($view)->with('trip',$trip->subTour)
        ->with('tour',$trip);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour)
    {
        
        //
        return view('admin.tour.edit')->with('tour',$tour);
        // return $tour;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Tour $tour
     * @return \Illuminate\Http\Response
     */
    public function update(TourRequest $request, Tour $tour)
    {
        
        //
        $this->tour->update($request,$tour);
        return redirect()->route('tour.edit',$tour);
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tour $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
        //
        $this->tour->delete($tour->id);
        return redirect()->route('tour.index');
    }
}
