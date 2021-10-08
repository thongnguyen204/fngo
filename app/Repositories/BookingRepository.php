<?php
namespace App\Repositories;

use App\Models\Receipt;
use App\Models\Receipt_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingRepository implements BookingRepositoryInterface{

    private $receiptStatusAcceptedID = 1;
    private $receiptStatusWaitingID = 3;
    
    public function store($data){
        
        
        
    }
}
