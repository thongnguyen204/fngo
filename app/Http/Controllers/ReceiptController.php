<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Receipt_Detail;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $receipts = Receipt::paginate(10);
        return view('admin.receipt.index')->with('receipts',$receipts);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  Receipt $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(Receipt $receipt)
    {
        //
        $receiptDetails = Receipt_Detail::
        where('receipt_id',$receipt->id)->paginate(10);

        return view('admin.receiptDetail.index')
        ->with('receiptDetails',$receiptDetails);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        // 
        // return 'edit';
        return view('admin.receipt.edit')->with('receipt',$receipt);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        //
        $receipt->price_sum =  $request->price_sum;
        $receipt->description =  $request->description;
        $receipt->save();
        return redirect()->route('receipt.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
        //
        $receiptDetails = $receipt->receipt_detail;
        foreach ($receiptDetails as $receiptDetail) {
            $receiptDetail->delete();
        }
        $receipt->delete();
        return redirect()->route('receipt.index');
        
    }
}
