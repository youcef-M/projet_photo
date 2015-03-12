<?php

namespace Lib\Check\User;
use Lib\Gestion\User\UserGestion as UserGestion;
use Hash;
use User;

class UserCheck implements UserCheckInterface {
    
    public function __construct(
        UserGestion $user_gestion
    )
    {
        $this->user_gestion = $user_gestion;
    }
    
    
    public function missing($id)
    {
        return is_null($this->user_gestion->show($id));
    }
    
    
    public function badLogin()
    {
        $user = $this->user_gestion->login();
        return is_null($user) || !Hash::check($this->user_gestion->getPassword(), $user->password);
    }
    
    
    public function badToken()
    {
        $user = $this->user_gestion->byToken();
        if(is_null($user)){
            return true;
        }else{
            return false;
        }
    }
}