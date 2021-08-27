<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt_Detail extends Model
{
    //
    protected $fillable = [
        'category_id','unit_price','quantity',
    ];
    public function receipt()
    {
        return $this->belongsTo(Receipt::class);
    }
    public function ht_booking()
    {
        return $this->hasOne(ht_booking::class);
    }
    
}
