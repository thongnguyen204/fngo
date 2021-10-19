<?php
namespace App\Repositories;

interface ArticleCommentRepositoryInterface{
    public function getAllCommentsOfArticle($article_id);
    public function store($article_id,$user_id,$content);
}