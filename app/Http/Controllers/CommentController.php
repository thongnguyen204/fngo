<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Services\CommentServiceInterface;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    private $comment;
    public function __construct(CommentServiceInterface $comment)
    {
        $this->comment = $comment;
    }
    public function test()
    {
        return 'ok';
    }

    public function getCommentsOfProduct($product_code)
    {
        // return $this->comment->getAllCommentsOfProduct($product_code);
        return view('comment.index');
    }

    public function addComment(CommentRequest $request){
        $this->comment->store($request->data);

        $product_code = $request->data['product'];

        $comments = $this->comment->getAllCommentsOfProduct($product_code);
        
        // convert comments json to plain old PHP array
        $array = json_decode($comments,true);
        
        // check array have comment or not
        $have_comment = true;
        if(!$array)
            $have_comment = false;
        

        return view('comment.index')
        ->with('product_code',$product_code)
        ->with('comments',$comments)
        ->with('have_comment',$have_comment);
    }
}
