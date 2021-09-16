<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Repositories\TourRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    private $tour;

    public function __construct(TourRepositoryInterface $tour)
    {
        $this->tour = $tour;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trips = $this->tour->all();
        $role = Auth::user()->role->name;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->tour->store($request);
        return redirect()->route('tour.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        //
        $role = Auth::user()->role->name;
        $view = $role . ".tour.detail";
        return view($view)->with('trip',$trip->subTrip);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $tour)
    {
        
        //
        return view('admin.tour.edit')->with('tour',$tour);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Trip $tour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trip $tour)
    {
        
        //
        $this->tour->update($request,$tour);
        return redirect()->route('tour.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $tour)
    {
        //
        $this->tour->delete($tour->id);
        return redirect()->route('tour.index');
    }
}
