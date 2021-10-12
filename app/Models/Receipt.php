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
        'user_id','price_sum','description',
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
    public function money($money){
        return currency_format($money);
    }
}
