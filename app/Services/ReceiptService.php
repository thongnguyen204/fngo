<?php
namespace App\Services;

use App\Models\Receipt;
use App\Models\Receipt_Detail;
use App\Repositories\ReceiptRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceiptService implements ReceiptServiceInterface
{
    private $receiptStatusAcceptedID = 1;
    private $receiptStatusWaitingID = 3;

    private $receipt;

    public function __construct(ReceiptRepositoryInterface $receipt)
    {
        $this->receipt = $receipt;
    }

    //get user's role name
    public function getRoleName(){
        return $this->receipt->getRoleName();
    }
    public function all(){
        $user_id = Auth::user()->id;
        return $this->receipt->getReceiptOfUser($user_id);
    }
    public function getWaitingReceipt(){
        return $this->receipt->getWaitingReceipt();
    }
    
    public function acceptedIndex(){
        return $this->receipt->getAcceptedIndex();
    }
    public function receiptAccept(Receipt $receipt){
        $receipt->status_id = $this->receiptStatusAcceptedID;
        $this->receipt->saveReceipt($receipt);
    }
    public function show(Receipt $receipt){
        return  $this->receipt->show($receipt);
    }
    public function update(Request $request, Receipt $receipt){
        $receipt->price_sum =  $request->price_sum;
        $receipt->description =  $request->description;
        $this->receipt->saveReceipt($receipt);
    }
    public function delete($id){
        $this->receipt->delete($id);
    }

    // lay trang thai hoa don de tra ra route thich hop
    public function getRoute(Receipt $receipt){
        if($receipt->status_id == $this->receiptStatusAcceptedID)
            return 'receipt.indexAccepted';
        else if($receipt->status_id == $this->receiptStatusWaitingID)
                return 'receipt.index';
    }
    public function store(Receipt $receipt){
        return $this->receipt->store($receipt);
    }
    public function whereMonth($month,$year){
        return $this->receipt->whereMonth($month,$year);
    }
    public function whereDay($day,$month,$year){
        return $this->receipt->whereDay($day,$month,$year);
        // return 11;
    }
    public function whereYear($year){
        return $this->receipt->whereYear($year);
    }
}