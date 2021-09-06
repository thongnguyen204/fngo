<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt_Detail extends Model
{

    private int $receipt_id;
    private String $category;
    private int $quantity;
    private int $price;
    
    

    
    //
    protected $fillable = [
        'receipt_id','category_id','unit_price','quantity',
    ];
    public function receipt()
    {
        return $this->belongsTo(Receipt::class);
    }
    public function ht_booking()
    {
        return $this->hasOne(ht_booking::class,'receipt_detail_id');
    }
    public $table = "receipt_details";
    
}
