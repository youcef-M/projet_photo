<?php namespace Lib\Gestion\User;

use Request;
use Group;
class GroupGestion implements GroupGestionInterface {

    public function index($id)
    {
        
    }
    
    
    public function store()
    {
        $group = new Group;
        $group->name = Request::get('name');
        $group->description = Request::get('description');
        $group->save();

    }


    public function show($id)
    {
        return Group::find($id);
    }
    
    
    public function update($id)
    {
        $group = new Group::find($id);
        $group->name = Request::get('name');
        $group->description = Requestion::get('description');
        $group->save();
    }
    
    
    public function destroy($id)
    {
        Group::find($id)->delete();
    }
}