<?php

namespace App\Http\Controllers;

use App\Services\ReceiptServiceInterface;
use App\Services\UserServiceInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    private $user;
    private $receipt;

    public function __construct
    (
        UserServiceInterface $user,
        ReceiptServiceInterface $receipt
    )
    {
        $this->user = $user;
        $this->receipt = $receipt;
    }

    public function index()
    {
        $users = $this->user->countUser('all');
        $countUser = $this->user->countUser('user');
        $countEmployee = $this->user->countUser('employee');
        $countAdmin = $this->user->countUser('admin');
        $countNewUser = $this->user->countNewUser();
        $countWaitingOrders = $this->receipt->getNewReceiptWithoutPaginate()->count();
        $countPaidOrdersToday = $this->receipt->paidToday()->count();
        

        
        return view('admin.dashboard.content')
        ->with('countUser',$countUser)
        ->with('countNewUser',$countNewUser)
        ->with('countWaitingOrders',$countWaitingOrders)
        ->with('countPaidOrdersToday',$countPaidOrdersToday)
        ->with('countEmployee',$countEmployee)
        ->with('countAdmin',$countAdmin)
        ->with('countAllUser',$users);
        
    }
}
