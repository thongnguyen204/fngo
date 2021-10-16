<?php
namespace App\Services;

interface CommentServiceInterface{
    public function getAllCommentsOfProduct($product_code);
    public function store($data);
}