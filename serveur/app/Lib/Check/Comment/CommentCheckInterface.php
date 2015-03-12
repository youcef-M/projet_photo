<?php

namespace Lib\Check\Comment;

interface CommentCheckInterface {
    
    public function missing($id);
    public function missingUser($id);
    public function missingPost($id);
    
}