<?php

namespace Lib\Check\Comment;

use Lib\Gestion\Comment\CommentGestion as CommentGestion;
use Comment;
use User;
use Post;
use Request;


class CommentCheck implements CommentCheckInterface {
    
    public function __construct(
        CommentGestion 			$comment_gestion
    )
    {
        $this->comment_gestion 		= $comment_gestion;
    }
    
    
    public function missing($id)
    {
        return is_null(Comment::find($id)->first());
    }
    
    
    public function missingUser($id)
    {
        return count($this->comment_gestion->byUser($id)) == 0;
    }
    
    
    public function missingPost($id)
    {
        return count($this->comment_gestion->byPost($id)) == 0;
    }
    
}