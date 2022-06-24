<?php
namespace App\Repositories;

use App\Models\Products;

interface ProductRepositoryInterface
{

    public function getProductByID($id);

    public function getProductByCode($product_code);

    public function save(Products $products);

    public function destroy($id);
}
