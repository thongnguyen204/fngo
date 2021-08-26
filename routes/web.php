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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');

    Route::resource('/user','UserController')
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

    Route::resource('/hotel','HotelController');
    
    Route::resource('/room','RoomController')
    ->except([
        'index','show'
    ]);
});

Route::get('/test',function(){
    
    return Auth::user();
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


