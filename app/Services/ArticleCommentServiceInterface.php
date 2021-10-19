<?php
namespace App\Services;

interface ArticleCommentServiceInterface{
    public function getAllCommentsOfArticle($article_id);
    public function store($data);
}