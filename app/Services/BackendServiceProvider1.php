<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider1 extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Services\UserServiceInterface',
            'App\Services\UserService',
        );
        $this->app->bind(
            'App\Services\TourServiceInterface',
            'App\Services\TourService',
        );
        $this->app->bind(
            'App\Services\HotelServiceInterface',
            'App\Services\HotelService',
        );
        $this->app->bind(
            'App\Services\BookingServiceInterface',
            'App\Services\BookingService',
        );
        $this->app->bind(
            'App\Services\RoomServiceInterface',
            'App\Services\RoomService',
        );
        $this->app->bind(
            'App\Services\ProductServiceInterface',
            'App\Services\ProductService',
        );
        $this->app->bind(
            'App\Services\ReceiptServiceInterface',
            'App\Services\ReceiptService',
        );
        
        
        
    }
}