<?php
namespace App\Repositories;

interface CommentRepositoryInterface{
    public function getAllCommentsOfProduct($productId);
    public function store($product_id,$user_id,$content);
}