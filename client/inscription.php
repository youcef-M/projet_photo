<?php
	include 'include.php';
	
	$_SESSION['errors'] = [];
	$fields = [
		'username' => urlencode($_POST['username']),
		'email' => $_POST['email'],
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
		redirect('register.php');		
	}elseif($result['code'] == 500)
	{
		setFlash('Nos services sont en panne, nous faisons notre possible pour régler le problème.','danger');
		redirect('serveur_down.php');
	}else{
		$_SESSION['errors'] = [];
		setFlash('Votre inscription a bien été éffectuée.');
		redirect('register.php');
	}
	

?>