<?php
namespace App\Repositories;

use App\Models\Article;


class ArticleRepository implements ArticleRepositoryInterface{
    
    public function getAllArticles(){
        return Article::all();
    }
    public function store(Article $article){
        $article->save();
    }
    public function destroy(Article $article){
        $article->delete();
    }
}