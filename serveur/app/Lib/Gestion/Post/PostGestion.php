<?php namespace Lib\Gestion\Post;

use Post;
use Input;
use Hash;
use Request;
use Str;

class PostGestion implements PostGestionInterface {
    
    public function store()
    {
        
        $post = new Post;
        $post->titre = Request::get('titre');
        if(Request::has('description'))
		{
		    $post->description = Request::get('description');
		}else{
		    $post->description = 'No description for this picture';
		}
        $post->user_id = Request::get('user_id');
        $post->privacy = Request::get('privacy');
        $post->note_totale = 0;
        
        $chemin = public_path() . '/images/' . $post->user_id;
        $image = Request::file('photo');
        $extension = $image->getClientOriginalExtension();
        
        do{
            $nom = Str::random(10) . '.' . $extension;
        }while(file_exists($chemin . '/' . $nom));
        
        $post->chemin = '/images/' . $post->user_id . '/' . $nom;
        $image->move($chemin,$nom);
        $post->save();
        
    }
    
    public function show($id)
    {
        return Post::find($id);
    }
    
    public function update($id)
    {
		$post = Post::find($id);
		$post->titre = Request::get('titre');
		if(Request::has('description'))
		{
		    $post->description = Request::get('description');
		}else{
		    $post->description = 'No description for this picture';
		}
		$post->privacy = Request::get('privacy');
		$post->save();
    }
    
    public function destroy($id)
    {
        Post::find($id)->delete();
    }
    
    public function privacy($id)
    {
        $post = Post::find($id);
        $post->privacy = Request::get('privacy');
		$post->save();
    }
    
}