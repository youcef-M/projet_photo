<?php

namespace Lib\Check\Post;

use Lib\Gestion\Post\PostGestion as PostGestion;
use Post;
use User;
use Request;


class PostCheck implements PostCheckInterface {
    
    public function __construct(
        PostGestion $post_gestion
    )
    {
        $this->post_gestion = $post_gestion;
    }
    
    
    public function missing($id)
    {
        return is_null($this->post_gestion->show($id));
    }
    
    
    public function missingUser($id)
    {
        return is_null(User::find($id));
    }
    
}