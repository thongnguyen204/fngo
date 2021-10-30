<?php
namespace App\Services;

use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MomoService implements MomoServiceInterface{

    private $receipt;
    private $product;
    private $tour;
    private $room;

    public function __construct
    (
        ReceiptServiceInterface $receipt,
        ProductServiceInterface $product,
        TourServiceInterface $tour,
        RoomServiceInterface $room
    )
    {
        $this->receipt = $receipt;
        $this->product = $product;
        $this->tour = $tour;
        $this->room = $room;
    }
    function execPostRequest($url, $data)
    {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
    }
    

    function getTotalPrice($data){
        $totalPrice = 0;
        foreach ($data as $product ) {
            $product1 = $this->product->getProductByCode($product['key']);
            if($product1->category_id == 2) //2 is tour 1 is hotel
                $price_per_unit = $this->tour->getTourByCode($product['key'])->price;
            else
                $price_per_unit = $this->room->getRoomByCode($product['key'])->price;
            $totalPrice += $price_per_unit * $product['value'];
        }
        return $totalPrice;
    }

    function getReceiptID($data){
        $momo = 4;
        $receipt1 = new Receipt;
        $receipt1->user_id = Auth::user()->id;
        $receipt1->price_sum = $this->getTotalPrice($data);
        $receipt1->payment_id = $momo;
        $receipt1 = $this->receipt->store($receipt1);
        return $receipt1->id;
    }


    public function checkout(Request $request)
    {
        $totalPrice = $this->getTotalPrice($request->data);
        $receiptID = $this->getReceiptID($request->data);
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        
        $partnerCode = 'MOMOUR5V20211030';
        $accessKey = '7qS9EiT0H88F9VJ0';
        $serectkey = 'CNHk35tDgIlkcj0GqRyi3zo0QSlSa4DN';

        $orderInfo = "Thanh toán qua MoMo";
        $amount = $totalPrice;
        $orderId = $receiptID;
        $redirectUrl = route('home');
        $ipnUrl = route('home');
        $extraData = "";

        $requestId = time() . "";
        $requestType = "captureWallet";

        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "FnGO",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        // return $data;  // decode json
        $jsonResult = json_decode($result, true);  // decode json
        // if($jsonResult['resultCode'] == 0)
            // return ($jsonResult['payUrl']);
            return $jsonResult;
        // else
            // return 'error';
    }
}