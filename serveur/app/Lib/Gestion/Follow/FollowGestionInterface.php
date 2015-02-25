<?php
namespace Lib\Gestion\Follow;

interface FollowGestionInterface {
    
    public function store();
    public static function following($id);
    public function followingIds($id);
    public static function followers($id);
    public function followersIds($id);
    public function destroy();
}