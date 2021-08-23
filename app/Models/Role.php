<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    //
    protected $fillable = [
        'id','name',
    ];
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public $timestamps = false;
}
