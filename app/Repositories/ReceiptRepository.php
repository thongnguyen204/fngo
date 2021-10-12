<?php
namespace App\Repositories;

use App\Models\Receipt;
use App\Models\Receipt_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceiptRepository implements ReceiptRepositoryInterface
{
    private $receiptStatusAcceptedID = 1;
    private $receiptStatusWaitingID = 3;

    //get user's role name
    public function getRoleName(){
        return Auth::user()->role->name;
    }
    public function getWaitingReceipt(){
        return Receipt::where('status_id',$this->receiptStatusWaitingID)
        ->paginate(10);
    }
    public function getReceiptOfUser($user_id){
        return Receipt::where('user_id',$user_id)
        ->orderBy('id','desc')->get();
    }
    
    public function getAcceptedIndex(){
        return Receipt::where('status_id',$this->receiptStatusAcceptedID)
        ->paginate(10);
    }
    public function saveReceipt(Receipt $receipt){
        $receipt->save();
    }
    
    public function show(Receipt $receipt){
        return  Receipt_Detail::
        where('receipt_id',$receipt->id)->paginate(10);
    }
    
    public function delete($id){
        Receipt::destroy($id);
    }

    public function store(Receipt $receipt){
        $receipt->save();
        return $receipt;
    }
    public function whereMonth($month,$year){
        return Receipt::where('status_id',$this->receiptStatusAcceptedID)
        ->whereYear ('created_at', $year)
        ->whereMonth('created_at', $month)
        ->get();
    }
    public function whereDay($day,$month,$year){
        return Receipt::where('status_id',$this->receiptStatusAcceptedID)
        ->whereYear ('created_at', $year)
        ->whereMonth('created_at', $month)
        ->whereDay  ('created_at', $day)
        ->get();
        // return $month;
    }
    public function whereYear($year){
        return Receipt::where('status_id',$this->receiptStatusAcceptedID)
        ->whereYear ('created_at', $year)
        ->get();
    }
}