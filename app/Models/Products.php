<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $fillable = [
        'product_code','name','avatar'
    ];
    public $timestamps = false;

    public function receipt(){
        return $this->hasMany(Receipt_Detail::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
