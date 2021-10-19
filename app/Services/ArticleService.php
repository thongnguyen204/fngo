<?php
namespace App\Services;

use App\Repositories\ArticleRepositoryInterface;


class ArticleService implements ArticleServiceInterface{
    private $article;

    public function __construct(ArticleRepositoryInterface $article)
    {
        $this->article = $article;
    }
    
    public function getAllArticles(){
        return $this->article->getAllArticles();
    }
}