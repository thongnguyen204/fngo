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
        Receipt::where('user_id',$user_id)
            ->paginate(10);
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
}