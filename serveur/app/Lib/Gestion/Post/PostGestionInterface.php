<?php
namespace Lib\Gestion\Post;

interface PostGestionInterface {
    
    public function index();
    public function store();
    public function show($id);
    public function update($id);
    public function destroy($id);
    public function privacy($id);
    public function getFeed($id);
    public function latestFeed();
}