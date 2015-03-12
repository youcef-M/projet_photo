<?php

namespace Lib\Gestion\Comment;

use Comment;
use Request;
use User;

class CommentGestion implements CommentGestionInterface
{
    public function byPost($id)
    {
        $page = Request::get('page');
        return Comment::where('post_id',$id)->skip(10*($page-1))->take(10)->get();
    }
    
    
    public function byUser($id)
    {
        $page = Request::get('page');
        return Comment::where('user_id',$id)->skip(10*($page-1))->take(10)->get();
        //return User::find($id)->comments;
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
        //$comment->user_id = Request::get('user_id');
        //$comment->post_id = Request::get('post_id');
        $comment->save();
    }
    
    
    public function destroy($id)
    {
        Comment::find($id)->delete();
    }
    
    
}