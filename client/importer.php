<?php
	include 'include.php';
	isAllowed();

	$file = $_FILES['photo']['tmp_name'];
	
	//$cfile = new CurlFile($file['name'],$file['type'],$file['name']);
	
	$fields = [
		'titre' => urlencode($_POST['titre']),
		'user_id' => $_SESSION['profil']['id'],
		'photo' => '@' . realpath($file),
		'description' => urlencode($_POST['description']),
		'privacy' => 0
	];

	$url = 'http://api-rest-youcef-m.c9.io/post/new';
	$result = httpPost($fields,$url);

	if($result['code'] == 400)
	{
		$error = json_decode($result['content']);
		foreach ($error as $k => $v) {
			$_SESSION['errors'][$k] = $v[0];
		}
		redirect('importerphoto.php');		
	}elseif($result['code'] == 500)
	{	
		setFlash('Nos services sont en panne, nous faisons notre possible pour régler le problème.','danger');
		redirect('serveur_down.php');
	}elseif($result['code'] == 200){	
		setFlash("Votre photo a bien été envoyée");
		redirect('latest.php');
	}else{
		setFlash('Nos services sont en panne, nous faisons notre possible pour régler le problème.','danger');
		redirect('serveur_down.php');
	}
	