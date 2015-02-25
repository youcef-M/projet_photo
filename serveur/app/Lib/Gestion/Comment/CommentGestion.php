<?php

namespace Lib\Gestion\Comment;

use Comment;
use Request;

class CommentGestion implements CommentGestionInterface
{
    public function byPost($id)
    {
        return Comment::where('post_id',$id)->first();
    }
    
    
    public function byUser($id)
    {
        return Comment::where('user_id',$id)->first();
    }
    
    
    public function store()
    {
        $comment = new Comment;
        $comment->content = Request::get('content');
        $comment->user_id = Request::get('user_id');
        $comment->post_id = Request::get('post_id');
        $comment->save();
    }
    
    
    public function show($id)
    {
        return Comment::find($id);
    }
    
    
    public function update($id)
    {
        $comment = Comment::find($id);
        $comment->content = Request::get('content');
        $comment->user_id = Request::get('user_id');
        $comment->post_id = Request::get('post_id');
        $comment->save();
    }
    
    
    public function destroy($id)
    {
        Comment::find($id)->delete();
    }
    
    
}