<?php

namespace App\Models;
include 'functions.php';
use App\User;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    private int $user_id;
    private int $price_sum;
    private String $description;

    

    //
    protected $fillable = [
        'user_id','price_sum','description','payment_id'
    ];
    public function receipt_detail()
    {
        return $this->hasMany(Receipt_Detail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function status()
    {
        return $this->belongsTo(ReceiptStatus::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function money($money){
        return currency_format($money);
    }

    public function createdDay(){
        
        $date = $this->created_at;
        $day = date('d',strtotime($date));
        $month = date('m',strtotime($date));
        $year = date('Y',strtotime($date));
        $time = date("H:i:s",strtotime($date));

        return $day . "/" . $month . "/" . $year. " ".$time;
    }

}
