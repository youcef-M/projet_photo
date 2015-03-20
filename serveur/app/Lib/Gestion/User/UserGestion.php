<?php namespace Lib\Gestion\User;

use User;
use Hash;
use Request;
use Image;

class UserGestion implements UserGestionInterface {
    
    public function index()
    {
        $page = Request::get('page');
        return User::skip(10*($page-1))->take(10)->get();
    }
    
    
    public function store()
    {
        $user = new User;
		$user->username = Request::get('username');
		$user->email = Request::get('email');
		$user->password = Hash::make(Request::get('password'));
		$user->active = 0;
		$user->token = md5(time() . ' - ' . uniqid());
		$user->save();
		copy(public_path() . '/avatar/base.jpg', public_path() . '/avatar/' . $user->id.'.jpg');
		Image::make(public_path() .'/avatar/' . $user->id.'.jpg')->resize(200, 200)->save(resizedName(public_path() .'/avatar/' . $user->id.'.jpg', 200, 200));
    }
    
    public function show($id)
    {
        return User::find($id);
    }
    
    public function update($id)
    {
        $user = User::find($id);
		$user->username = Request::get('username');
		$user->email = Request::get('email');
		$user->password = Hash::make(Request::get('password'));
		$user->save();
    }
    
    public function destroy($id)
    {
        User::find($id)->delete();
        $name = $id . '.jpg';
        $path = public_path() . '/avatar';
        if(file_exists($path . '/' . $name)){
            unlink($path . '/' . $name);
            unlink(resizedName($path . '/' . $name, 200, 200));
        }
    }
    
    public function login()
    {
        return User::where('username', Request::get('username'))->first();
    }
    
    public function activate()
    {
        $user = $this->byToken();
        $user->active = 1;
        $user->token = '';
        $user->save();
    }
    
    public function byToken()
    {
        $token = Request::get('token');
        return User::where('token',$token)->first();
    }
    
    public function getPassword()
    {
        return Request::get('password');
    }
    
    public function avatar($id)
    {
        $image = Request::file('photo');
        $path = public_path() . '/avatar';
        $name = $id . '.jpg';
        if(file_exists($path . '/' . $name)){
            unlink($path . '/' . $name);
            unlink(resizedName($path . '/' . $name, 200, 200));
        }
        $image->move($path, $name);
        Image::make($path . '/' . $name)->resize(200, 200)->save(resizedName($path . '/' . $name, 200, 200));
    }
}