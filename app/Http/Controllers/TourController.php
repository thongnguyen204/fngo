<?php

namespace App\Http\Controllers;

use App\Models\SubTrip;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trips = Trip::paginate(10);
        $role = Auth::user()->role->name;
        // return $role;
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
        $trip = new Trip;
        $trip->title = $request->title;
        $trip->content = $request->content;
        $trip->save();
        
        for ($i=1; isset($request->subTripTitle[$i]); $i++) { 
            $subtrip = new SubTrip;
            $subtrip->title = $request->subTripTitle[$i];
            $subtrip->content = $request->subTripContent[$i];
            $subtrip->save();
            
            $trip->subTrip()->attach($subtrip->id,['day' => $i]);
        }
        
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
        // return $role;
        $view = $role . ".tour.detail";
        return view($view)->with('trip',$trip->subTrip);
        // return $tour->subTrip;
        
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
