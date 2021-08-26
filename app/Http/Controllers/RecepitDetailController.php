<?php

namespace App\Http\Controllers;

use App\Models\Receipt_Detail;
use Illuminate\Http\Request;

class RecepitDetailController extends Controller
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
    public function store(Request $request)
    {
        //
        
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
     * @param  Receipt_Detail $receipt;
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt_Detail $receiptDetail)
    {
        //
        return view('receiptDetail.edit')
        ->with('receiptDetail',$receiptDetail);
        // return $receiptDetail;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt_Detail $receiptDetail)
    {
        //
        $id = $receiptDetail->id;
        $quantity = $request->quantity;
        $temp = $receiptDetail->receipt;
        Receipt_Detail::where('id', $id)
      ->update(['quantity' => $quantity]);
        return redirect()->route('receipt.show',$temp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt_Detail $receipt_Detail)
    {
        //
        $temp = $receipt_Detail->receipt;
        $receipt_Detail->delete();
        return redirect()->route('receipt.show',$temp);
    }
}
