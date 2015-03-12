<?php
namespace Lib\Gestion\Friend;

interface FriendGestionInterface {
    public function index($id);
    public static function friendsIds($id);
    public function store();
    public function activate();
    public function waiting($id);
    public function destroy();
}