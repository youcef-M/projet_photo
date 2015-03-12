<?php

namespace Lib\♥Gestion\Group;

interface GroupGestionInterface {
    
    public function index($id);
    public function store();
    public function show($id);
    public function update($id);
    public function destroy($id);
}