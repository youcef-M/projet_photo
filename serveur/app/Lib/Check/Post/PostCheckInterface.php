<?php

namespace Lib\Check\Post;

interface PostCheckInterface {
    
    public function missing($id);
    public function missingUser($id);
}