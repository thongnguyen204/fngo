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

use App\Models\Receipt;
use App\Models\Role;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/user','UserController')
->middleware(['auth','role:admin']);

Route::resource('/hotel','HotelController');
//->middleware(['auth','role:admin']);

Route::resource('/room','RoomController');
//->middleware(['auth','role:admin']);

Route::get('/test',function(){
    $user = User::where('name','thong')->first()->id;
    return $user;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


