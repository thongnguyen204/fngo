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
    public function all(){
        $role = $this->getRoleName();
        $user_id = Auth::user()->id;
        if($role == 'admin')
        $receipts = Receipt::where('status_id',$this->receiptStatusWaitingID)
        ->paginate(10);
        elseif($role == 'user')
        {
            $receipts = Receipt::where('user_id',$user_id)
            ->paginate(10);
        }
        return $receipts;
    }
    public function acceptedIndex(){
        return Receipt::where('status_id',$this->receiptStatusAcceptedID)
        ->paginate(10);
    }
    public function receiptAccept(Receipt $receipt){
        $receipt->status_id = $this->receiptStatusAcceptedID;
        $receipt->save();
    }
    public function show(Receipt $receipt){
        return  Receipt_Detail::
        where('receipt_id',$receipt->id)->paginate(10);
    }
    public function update(Request $request, Receipt $receipt){
        $receipt->price_sum =  $request->price_sum;
        $receipt->description =  $request->description;
        $receipt->save();
    }
    public function delete($id){
        Receipt::destroy($id);
    }

    // lay trang thai hoa don de tra ra route thich hop
    public function getRoute(Receipt $receipt){
        if($receipt->status_id == $this->receiptStatusAcceptedID)
            return 'receipt.indexAccepted';
        else if($receipt->status_id == $this->receiptStatusWaitingID)
                return 'receipt.index';
    }
}