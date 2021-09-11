<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $fillable = [
        'title','content',
    ];
    public function subTrip()
    {
        return $this->hasMany(SubTrip::class);
    }
}
