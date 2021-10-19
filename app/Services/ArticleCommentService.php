<?php
namespace App\Services;

use App\Repositories\ArticleCommentRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ArticleCommentService implements ArticleCommentServiceInterface{
    private $comment;
    public function __construct(ArticleCommentRepositoryInterface $comment)
    {
        $this->comment = $comment;
    }
    public function getAllCommentsOfArticle($article_id){
        return $this->comment->getAllCommentsOfArticle($article_id);
    }

    public function store($data)
    {
        $user_id = Auth::user()->id;
        $article_id = $data['article'];
        $content = $data['comment'];
        $this->comment->store($article_id,$user_id,$content);
    }

}