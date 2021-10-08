<?php
namespace App\Repositories;

use App\Models\Receipt;
use Illuminate\Http\Request;

interface ReceiptRepositoryInterface{
    public function getRoleName();
    public function getWaitingReceipt();
    public function getReceiptOfUser($user_id);
    public function saveReceipt(Receipt $receipt);
    public function getAcceptedIndex();

    public function show(Receipt $receipt);
    public function delete($id);

    public function store(Receipt $receipt);
}