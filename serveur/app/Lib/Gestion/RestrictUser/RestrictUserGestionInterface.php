<?php
namespace Lib\Gestion\RestrictUser;

interface RestrictUserGestionInterface {
    public function index($id);
    public function RestrictPost();
    public function store();
    public function destroyAll($id);
    public function destroy();
}