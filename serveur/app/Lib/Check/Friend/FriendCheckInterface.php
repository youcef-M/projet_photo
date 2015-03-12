<?php

namespace Lib\Check\Friend;

interface FriendCheckInterface {
    
    public function missing();
    public function exist();
    public function missingUser();
    public function noFriends($id);
    public function noWaiting($id);
}