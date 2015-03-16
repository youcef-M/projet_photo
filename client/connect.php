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
		redirect('index.php');		
	}elseif($result['code'] == 500)
	{
		setFlash('Nos services sont en panne, nous faisons notre possible pour régler le problème.','danger');
		redirect('serveur_down.php');
	}elseif($result['code'] == 404)
	{
		setFlash("Nom d'utilisateur ou mot de passe incorrect","danger");
		redirect('index.php');
	}else{	
		
		$user = json_decode($result['content']);
		
		foreach ($user as $k => $v) {
			$_SESSION['profil'][$k] = $v;
		}
		setFlash('Vous vous etes connecté avec succès');
		redirect('accueil.php');
	}
