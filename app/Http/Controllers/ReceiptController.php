<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Receipt_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $receiptStatusAcceptedID = 1;
    private $receiptStatusWaitingID = 3;
    public function index()
    {
        //
        

        $role = Auth::user()->role->name;
        $user_id = Auth::user()->id;
        if($role == 'admin')
        $receipts = Receipt::where('status_id',$this->receiptStatusWaitingID)
        ->paginate(10);
        elseif($role == 'user')
        {
            $receipts = Receipt::where('user_id',$user_id)
            ->paginate(10);
        }
        $view = $role . ".receipt.index";
        return view($view)->with('receipts',$receipts);    
        // return view('admin.receipt.index')->with('receipts',$receipts);
    }
    
    public function acceptedIndex()
    {
        
        $receipts = Receipt::where('status_id',$this->receiptStatusAcceptedID)
        ->paginate(10);
        $role = Auth::user()->role->name;
        $view = $role . ".receiptAccepted.index";
        return view($view)->with('receipts',$receipts); 
    }
    public function receiptAccept(Receipt $receipt)
    {
        $receipt->status_id = $this->receiptStatusAcceptedID;
        $receipt->save();
        return redirect()->route('receipt.index');
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
        $role = Auth::user()->role->name;
        $view = $role . ".receiptDetail.index";
        $receiptDetails = Receipt_Detail::
        where('receipt_id',$receipt->id)->paginate(10);

        return view($view)
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
            $receiptDetail->ht_booking->delete();
            $receiptDetail->delete();
        }
        $receipt->delete();
        return redirect()->route('receipt.index');
        
    }
}
