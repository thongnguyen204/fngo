<?php
namespace App\Repositories;

use Illuminate\Http\Request;

interface BookingRepositoryInterface{
    public function store($data);
}