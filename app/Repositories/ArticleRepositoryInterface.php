<?php
namespace App\Repositories;

use App\Models\Article;

interface ArticleRepositoryInterface
{
    public function getAllArticles();
    public function store(Article $article);
    public function destroy(Article $article);
    public function search($keyword);
    public function findArticle($id);
    public function getTopArticle($number);
}