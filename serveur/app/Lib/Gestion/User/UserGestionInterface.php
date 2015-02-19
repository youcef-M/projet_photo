<?php
namespace Lib\Gestion\User;

interface UserGestionInterface {
    
    public function store();
    public function show($id);
    public function update($id);
    public function destroy($id);
    public function login();
    
}