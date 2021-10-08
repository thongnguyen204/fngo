<?php
namespace App\Services;

use App\Models\Receipt;
use Illuminate\Http\Request;

interface ReceiptServiceInterface{
    public function getRoleName();
    public function all();
    public function acceptedIndex();
    public function receiptAccept(Receipt $receipt);
    public function show(Receipt $receipt);
    public function update(Request $request, Receipt $receipt);
    public function delete($id);
    public function getRoute(Receipt $receipt);
    public function store(Receipt $receipt);
}