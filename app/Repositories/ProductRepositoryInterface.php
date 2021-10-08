<?php
namespace App\Repositories;

use Illuminate\Http\Request;

interface ProductRepositoryInterface{
    public function getProductByID($id);
    public function getProductByCode($product_code);
}