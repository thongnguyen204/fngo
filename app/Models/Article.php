<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'thumbnail',
        'abstract',
        'background'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
