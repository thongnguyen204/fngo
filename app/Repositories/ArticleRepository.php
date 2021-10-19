<?php
namespace App\Repositories;

use App\Models\Article;


class ArticleRepository implements ArticleRepositoryInterface{
    
    public function getAllArticles(){
        return Article::all();
    }
}