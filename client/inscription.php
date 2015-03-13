<?php
	if (session_status() == PHP_SESSION_NONE) {
	    	session_start();
	}

	include 'http_request.php';

	$fields = [
		'username' => urlencode($_POST['username']),
		'email' => urlencode($_POST['email']),
		'password' => urlencode($_POST['password'])
	];
	$url = 'http://api-rest-youcef-m.c9.io/user/new';
	
	$result = httpPost($fields,$url);

	if($result['code'] == 400)
	{
		$error = json_decode($result['content']);
		foreach ($error as $k => $v) {
			$_SESSION['errors'][$k] = $v[0];
		}
		redirect('index.php');		
	}elseif($result['code'] == 400)
	{
		redirect('serveur_down.php');
	}
	else{
		var_dump($result);die();
		$_SESSION['errors'] = [];
		redirect('connexion.php');
	}
	

?>