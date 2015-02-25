<?php

namespace Lib\Gestion\Comment;

interface CommentGestionInterface
{
    public function byPost($id);
    public function byUser($id);
    public function store();
    public function show($id);
    public function update($id);
    public function destroy($id);
}