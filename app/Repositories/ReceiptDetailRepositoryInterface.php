<?php
namespace App\Repositories;

use App\Models\Receipt_Detail;
use Illuminate\Http\Request;

interface ReceiptDetailRepositoryInterface
{
    public function store(Receipt_Detail $receipt);

    public function update(Request $request, Receipt_Detail $receiptDetail);

    public function delete(Receipt_Detail $receipt_detail);
}
