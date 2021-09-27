<?php
namespace App\Repositories;

use App\Http\Requests\TourRequest;
use App\Models\SubTour;
use App\Models\Tour;
use DateTime;
use Illuminate\Http\Request;
class TourRepository implements TourRepositoryInterface
{
    public function delete($id)
    {
        Tour::destroy($id);
    }

    public function store(TourRequest $request){

        $departure_date = DateTime::createFromFormat('Y-m-d',
            $request->departure_date);
            
        $tour = new Tour;
        $tour->tour_code = $departure_date->format('d');
        $tour->title = $request->title;
        $tour->price = $request->price;
        $tour->passenger_num = $request->passenger_num;
        $tour->day_number = $request->day_number;
        $tour->departure_date = $departure_date;
        $tour->departure_place = $request->departure_place;
        $tour->day_number = $request->day_number;

        // them so 0 vao dau gio va phut
        if($request->departure_hour < 10) $departure_hour = "0".($request->departure_hour);
        else $departure_hour = $request->departure_minute;
        if($request->departure_minute < 10) $departure_minute = "0".$request->departure_minute;
        else $departure_minute = $request->departure_minute;
        
        //ngoai view co 2 input hour va minute


        $tour->departure_hour = $request->departure_hour;
        $tour->departure_minute = $request->departure_minute;
        $departure_time = $departure_hour .":". $departure_minute;
        $tour->departure_time = $departure_time;

        $tour->content = $request->content;
        $tour->save();
        
        for ($i=1; isset($request->subTripTitle[$i]); $i++) { 
            $subtrip = new SubTour;
            $subtrip->title = $request->subTripTitle[$i];
            $subtrip->tour_id = $tour->id;
            $subtrip->day = $i;
            $subtrip->content = $request->subTripContent[$i];
            $subtrip->save();
        }
    }
    public function all(){
        return $trips = Tour::paginate(10);
    }
    public function update(TourRequest $request, Tour $tour){
        $count = 0;
        $tour->title = $request->title;
        $tour->price = $request->price;
        $tour->content = $request->content;

        for ($i=1; isset($request->subTripTitle[$i]); $i++) { 
            if(isset($tour->subTour[$i-1])){
                $subtrip = $tour->subTour[$i-1];
                $subtrip->title = $request->subTripTitle[$i];
                $subtrip->content = $request->subTripContent[$i];
                $subtrip->save();
            }
            else{
                $subtrip = new SubTour;
                $subtrip->title = $request->subTripTitle[$i];
                $subtrip->tour_id = $tour->id;
                $subtrip->day = $i;
                $subtrip->content = $request->subTripContent[$i];
                $subtrip->save();
            }
            $count++;
        }
        $max = $tour->subTour->count();
        if($count < $max){
            for($i = 0; $i<($max - $count);$i++){
                $tour->subTour[$count+$i]->delete();
            }
        }
        $tour->save();

        
    }
}