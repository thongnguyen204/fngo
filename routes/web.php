<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Receipt_Detail;
use App\Models\Room;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Integer;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');

    Route::resource('/users','UserController')
    ->except([
        'create','store','show'
    ]);
    Route::get('/receiptAccepted','ReceiptController@acceptedIndex')
    ->name('receipt.indexAccepted');

    Route::resource('/receipt','ReceiptController')
    ->except([
        'index','show'
    ]);

    Route::resource('/receipt-detail','RecepitDetailController')
    ->except([
        'index','create', 'store',
    ]);

    Route::resource('/hotel','HotelController')
    ->except([
        'index','show'
    ]);

    Route::resource('/room','RoomController')
    ->except([
        'index','show','create'
    ]);
    Route::get('/room/create/{room}','RoomController@create')
    ->name('room.create');

    Route::post('accept/{receipt}','ReceiptController@receiptAccept')
    ->name('receipt.accept');

    Route::resource('/tour','TourController')
    ->except([
        'index','show'
    ]);
});

Route::middleware(['auth', 'role:user'])->group(function () {
    
    Route::get('/user', function () {
        return view('user.index');
    })->name('user');

    Route::get('/order/{room}', function ($roomID) {
        $room = Room::where('id',$roomID)->first();
        return view('user.order.create')->with('room',$room);
    })->name('orderForm');

    Route::post('/order','RoomController@order')
    ->name('room.order');

    Route::resource('/HotelBooking','HotelBookingController')
    ->except([
        'index','create','show','edit','update','destroy'
    ]);

});

Route::middleware(['auth'])->group(function () {
    
    Route::get('tour','TourController@index')
    ->name('tour.index');

    Route::get('tour/{trip}  ','TourController@show')
    ->name('tour.show');

    Route::get('hotel','HotelController@index')
    ->name('hotel.index');

    Route::get('hotel/{hotel} ','HotelController@show')
    ->name('hotel.show');

    Route::get('receipt','ReceiptController@index')
    ->name('receipt.index');

    Route::get('receipt/{receipt}  ','ReceiptController@show')
    ->name('receipt.show');
    
});






use Carbon\Carbon;
Route::get('/test',function(){
    // // $day = Auth::user()->created_at->toDateTimeString();
    // // $test =  date('d/m/Y',strtotime($day));
    // // var_dump($test);
    // $day = "20/04/2000";
    // $day2 = DateTime::createFromFormat('d/m/Y',$day);
    // // echo $day2->format('d/m/Y');
    // var_dump($day2);
    $trip = Trip::find(1);
    // $trip->subTrip()->attach(1);
    return Trip::find(1)->subTrip;
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


