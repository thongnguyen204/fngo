<?php
namespace App\Repositories;
use App\Models\Trip;
use App\Models\SubTrip;
use Illuminate\Http\Request;
class TourRepository implements TourRepositoryInterface
{
    public function delete($tourId)
    {
        Trip::destroy($tourId);
    }

    public function store(Request $request){
        $tour = new Trip;
        $tour->title = $request->title;
        $tour->content = $request->content;
        $tour->save();
        
        for ($i=1; isset($request->subTripTitle[$i]); $i++) { 
            $subtrip = new SubTrip;
            $subtrip->title = $request->subTripTitle[$i];
            $subtrip->trip_id = $tour->id;
            $subtrip->day = $i;
            $subtrip->content = $request->subTripContent[$i];
            $subtrip->save();
        }
    }
    public function all(){
        return $trips = Trip::paginate(10);
    }
    public function update(Request $request, Trip $tour){
        $count = 0;
        $tour->title = $request->title;
        $tour->content = $request->content;

        for ($i=1; isset($request->subTripTitle[$i]); $i++) { 
            if(isset($tour->subTrip[$i-1])){
                $subtrip = $tour->subTrip[$i-1];
                $subtrip->title = $request->subTripTitle[$i];
                $subtrip->content = $request->subTripContent[$i];
                $subtrip->save();
            }
            else{
                $subtrip = new SubTrip;
                $subtrip->title = $request->subTripTitle[$i];
                $subtrip->trip_id = $tour->id;
                $subtrip->day = $i;
                $subtrip->content = $request->subTripContent[$i];
                $subtrip->save();
            }
            $count++;
        }
        $max = $tour->subTrip->count();
        if($count < $max){
            for($i = 0; $i<($max - $count);$i++){
                $tour->subTrip[$count+$i]->delete();
            }
        }
        $tour->save();

        
    }
}