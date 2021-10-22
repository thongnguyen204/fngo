<?php
namespace App\Services;

use App\Models\Receipt;
use App\Models\Receipt_Detail;
use App\Repositories\BookingRepositoryInterface;
use App\Repositories\ReceiptDetailRepositoryInterface;
use App\Repositories\RoomRepositoryInterface;
use App\Repositories\TourRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingService implements BookingServiceInterface{
    private $booking;
    private $receipt;
    private $product;
    private $receipt_detail;
    private $tourRepository;
    private $roomRepository;

    private $receiptStatusAcceptedID = 1;
    private $receiptStatusWaitingID = 3;
    public function __construct(RoomRepositoryInterface $roomRepository,TourRepositoryInterface $tourRepository,ProductServiceInterface $product ,BookingRepositoryInterface $booking,ReceiptServiceInterface $receipt,ReceiptDetailRepositoryInterface $receipt_detail)
    {
        $this->tourRepository = $tourRepository;
        $this->roomRepository = $roomRepository;
        $this->product = $product;
        $this->booking = $booking;
        $this->receipt = $receipt;
        $this->receipt_detail = $receipt_detail;
    }
    public function updatePurchaseNumber($product_code)
    {
        if($product_code[0] == 't'){
            $tour = $this->tourRepository->searchCode($product_code);
            $tour->purchases_number++;
            $this->tourRepository->store($tour);
        }
        else{
            $room = $this->roomRepository->getRoomByCode($product_code);
            $room->purchases_number++;
            $this->roomRepository->store($room);
        }
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
            $receipt1->price_sum += $receipt1_detail->price;
            if(!is_null($product['date'])){
                $receipt1_detail->description = "checkin: ".$product['date'].'  '.$product['day'].' day(s)';
            }
            else   
            $receipt1_detail->description = "";

            //update purchases number
            $this->updatePurchaseNumber($product['key']);
            $this->receipt_detail->store($receipt1_detail);
            // dd($product['key']);
        }
        $run = $this->receipt->store($receipt1);
        // dd($data);
        
    }
    public function store(Request $request){
        // $this->booking->store($request->data);
        $this->createReceiptDetail($request->data);
        foreach ($request->data as $product) {
            $request->session()->forget('Cart');
        }
    }
}