<?php
namespace App\Services;

use Illuminate\Http\Request;

interface MomoServiceInterface{
    public function checkout(Request $request);
    
}