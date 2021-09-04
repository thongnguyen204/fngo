<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ht_booking;
use App\Models\Receipt;
use App\Models\Receipt_Detail;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use DateTime;

class HotelBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createReceipt()
    {
        $receipt = new Receipt;
        $receipt->user_id = Auth::user()->id;
        $receipt->price_sum = 0;
        $receipt->description = "";
        $receipt->save();
        return $receipt;
    }
    public function createReceiptDetail(int $room_id)
    {
        $receipt_id = $this->createReceipt()->id;
        $room = Room::where('id',$room_id)->first();
        $type = $room->type;
        $receiptDetail = new Receipt_Detail;
        $receiptDetail->receipt_id = $receipt_id;
        $receiptDetail->category = "nơi ở";
        $price = $type->price_per_night;

        // so luong
        $quantity = rand(1,5); 

        $receiptDetail->unit_price = $price;
        $receiptDetail->quantity = $quantity;

        //cap nhat lai tong gia tien cua receipt
        $receipt = Receipt::where('id',$receipt_id)->first();
        $receipt->price_sum = $price * $quantity;

        $receipt->save();
        $receiptDetail->save();

        return $receiptDetail;
    }
    public function store(Request $request)
    {
        //kieu du lieu datetime
        $arrive = DateTime::createFromFormat('Y-m-d',
            $request->arrive);
        $checkout = DateTime::createFromFormat('Y-m-d',
            $request->checkout);
        
        $booking = new ht_booking;
        $booking->room_id = $request->room_id;
        $booking->receipt_detail_id = $this->createReceiptDetail($request->room_id)->id;
        $booking->arrive = $arrive;
        $booking->checkout = $checkout;
        $booking->description = "";
        $booking->save();
        return redirect()->route('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
