<?php

namespace Lib\Check\Follow;

interface FollowCheckInterface {
    
    public function missing();
    public function missingUser();
    public function noFollowing($id);
    public function noFollowers($id);
}