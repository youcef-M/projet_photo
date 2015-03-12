<?php

namespace Lib\Check\Vote;

interface VoteCheckInterface {
    
    public function missingPost($id);
    public function badVote();
    public function missingVote();
    
}