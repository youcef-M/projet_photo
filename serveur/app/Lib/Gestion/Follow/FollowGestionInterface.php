<?php
namespace Lib\Gestion\Follow;

interface FollowGestionInterface {
    
    public function store();
    public function following($id);
    public static function followingIds($id);
    public function followers($id);
    public static function followersIds($id);
    public function destroy();
}