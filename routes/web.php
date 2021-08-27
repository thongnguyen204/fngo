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
use App\User;
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

    Route::resource('/receipt','ReceiptController')
    ->except([
        
    ]);

    Route::resource('/receipt-detail','RecepitDetailController')
    ->except([
        'index','create', 'store', 'show'
    ]);

    Route::resource('/hotel','HotelController')
    ->except([
        'index','show'
    ]);

    Route::resource('/room','RoomController')
    ->except([
        'index','show'
    ]);
});

Route::middleware(['auth', 'role:user'])->group(function () {
    
    Route::get('/user', function () {
        return view('user.index');
    })->name('user');

    
});
Route::get('hotel','HotelController@index')
->middleware(['auth'])->name('hotel.index');

Route::get('hotel/{hotel} ','HotelController@show')
->middleware(['auth'])->name('hotel.show');

use Carbon\Carbon;
Route::get('/test',function(){
    // $day = Auth::user()->created_at->toDateTimeString();
    // $test =  date('d/m/Y',strtotime($day));
    // var_dump($test);
    // $day = "20/04/2000";
    // $day2 = DateTime::createFromFormat('d/m/Y',$day);
    // echo $day2->format('d/m/Y');
    $receipt = Receipt_Detail::find(1);
    echo $receipt->ht_booking;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


