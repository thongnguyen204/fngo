<?php

namespace App\Models;

use App\User;
// use App\Models\Receipt_Detail;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
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
}
