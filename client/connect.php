<?php
	include 'include.php';

	$_SESSION['errors'] = [];
	$fields = [
		'username' => urlencode($_POST['username']),
		'password' => urlencode($_POST['password'])
	];
	$url = 'http://api-rest-youcef-m.c9.io/user/login';
	
	$result = httpPost($fields,$url);

	if($result['code'] == 400)
	{
		$error = json_decode($result['content']);
		foreach ($error as $k => $v) {
			$_SESSION['errors'][$k] = $v[0];
		}
		redirect('connexion.php');		
	}elseif($result['code'] == 500)
	{
		redirect('serveur_down.php');
	}elseif($result['code'] == 404)
	{
		$_SESSION['errors']['not_found'] = true;
	}else{	
		
		$user = json_decode($result['content']);
		
		foreach ($user as $k => $v) {
			$_SESSION['profil'][$k] = $v;
		}
		redirect('accueil.php');
	}
