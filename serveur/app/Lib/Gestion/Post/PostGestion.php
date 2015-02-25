<?php namespace Lib\Gestion\Post;

use Post;
use Hash;
use Request;
use Str;
use Route;
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
        $path = public_path() . Post::find($id)->chemin;
        if(file_exists($path)){
            unlink($path);
        }
        Post::find($id)->delete();
    }
    
    public function privacy($id)
    {
        $post = Post::find($id);
        $post->privacy = Request::get('privacy');
		$post->save();
    }
    
    public function getFeed($id)
    {
        $request = Request::create('/following/id/'.$id, 'GET', array());
		$userIds = json_decode(Route::dispatch($request)->getContent());
		
		return Post::whereIn('user_id', $userIds)->latest()->get();
    }
    
}