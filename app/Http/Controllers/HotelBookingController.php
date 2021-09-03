<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ht_booking;
use App\Models\Receipt;
use App\Models\Receipt_Detail;
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
        $receipt->price_sum = rand(1000,2000);
        $receipt->description = "";
        $receipt->save();
        return $receipt;
    }
    public function createReceiptDetail()
    {
        $receiptDetail = new Receipt_Detail;
        $receiptDetail->receipt_id = $this->createReceipt()->id;
        $receiptDetail->category = "nơi ở";
        $receiptDetail->unit_price = rand(1000,4000);
        $receiptDetail->quantity = rand(1,10);
            
        $receiptDetail->save();
        return $receiptDetail;
    }
    public function store(Request $request)
    {
        $arrive = DateTime::createFromFormat('Y-m-d',
            $request->arrive);
        $checkout = DateTime::createFromFormat('Y-m-d',
            $request->checkout);
        $booking = new ht_booking;
        $booking->receipt_detail_id = $this->createReceiptDetail()->id;
        $booking->room_id = $request->room_id;
        $booking->arrive = $arrive;
        $booking->checkout = $checkout;
        $booking->description = "";
        $booking->save();
        return redirect()->route('home');
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
