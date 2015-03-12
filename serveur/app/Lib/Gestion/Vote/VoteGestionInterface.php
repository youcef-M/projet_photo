<?php

namespace Lib\Gestion\Vote;

interface VoteGestionInterface {
    
    public function likes($id);
    public function dislikes($id);
    public function like();
    public function dislike();
    public function destroy();
}