<?php

namespace Lib\Check\User;

interface UserCheckInterface {
    
    public function missing($id);
    public function badLogin();
    public function badToken();
}