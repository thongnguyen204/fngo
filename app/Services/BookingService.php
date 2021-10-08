<?php
namespace App\Services;

use App\Models\Receipt;
use App\Models\Receipt_Detail;
use App\Repositories\BookingRepositoryInterface;
use App\Repositories\ReceiptDetailRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingService implements BookingServiceInterface{
    private $booking;
    private $receipt;
    private $product;
    private $receipt_detail;

    private $receiptStatusAcceptedID = 1;
    private $receiptStatusWaitingID = 3;
    public function __construct(ProductServiceInterface $product ,BookingRepositoryInterface $booking,ReceiptServiceInterface $receipt,ReceiptDetailRepositoryInterface $receipt_detail)
    {
        $this->product = $product;
        $this->booking = $booking;
        $this->receipt = $receipt;
        $this->receipt_detail = $receipt_detail;
    }
    public function createReceipt()
    {
        $receipt1 = new Receipt;
        $receipt1->user_id = Auth::user()->id;
        $receipt1->price_sum = 0;
        $receipt1->description = "";
        $receipt1 = $this->receipt->store($receipt1);
        return $receipt1;
    }
    public function createReceiptDetail($data){
        $receipt1 = $this->createReceipt();
        foreach ($data as $product ) {
            $product1 = $this->product->getProductByCode($product['key']);
            $product_id = $product1->id;
            $receipt1_detail = new Receipt_Detail;
            $receipt1_detail->receipt_id = $receipt1->id;
            $receipt1_detail->product_id = $product_id;
            $receipt1_detail->product_code = $product['key'];
            $receipt1_detail->quantity = $product['value'];
            $receipt1_detail->price = $product['price'];
            if(!is_null($product['date'])){
                $receipt1_detail->description = $product['date'];
            }
            else   
            $receipt1_detail->description = "";
            $this->receipt_detail->store($receipt1_detail);
            // dd($product['key']);
        }
        // dd($data);
        
    }
    public function store(Request $request){
        // $this->booking->store($request->data);
        $this->createReceiptDetail($request->data);
        // dd($request->data);
        
    }
}