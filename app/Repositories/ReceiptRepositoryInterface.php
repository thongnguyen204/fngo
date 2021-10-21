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

    public function searchID($keyword);
    public function searchUserID($keyword);

    public function getPaidIndex();

    public function getCanceledIndex();

    public function show(Receipt $receipt);
    public function delete($id);

    public function store(Receipt $receipt);
    
    public function pay(Receipt $receipt);
    public function unpay(Receipt $receipt);
    public function cancel(Receipt $receipt);

    public function whereMonth($month,$year);
    public function whereDay($day,$month,$year);
    public function whereYear($year);
}