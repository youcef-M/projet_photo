<?php
	include 'include.php';
	isAllowed();

	if(!isset($_GET['id']))
	{
		setFlash("action impossible.","danger");
		redirect("accueil.php");
		die();
	}
	$post =  $_GET['id'];
	$fields = [
		'titre' => urlencode($_POST['titre']),
		'description' => urlencode($_POST['description']),
		'privacy' => 0
	];

	$url = 'http://api-rest-youcef-m.c9.io/post/update/' . $post;
	$result = httpPut($fields,$url);

	if($result['code'] == 400)
	{
		$error = json_decode($result['content']);
		foreach ($error as $k => $v) {
			$_SESSION['errors'][$k] = $v[0];
		}
		redirect('modifier_photo.php?id=' . $post);		
	}elseif($result['code'] == 500)
	{	
		setFlash('Nos services sont en panne, nous faisons notre possible pour régler le problème.','danger');
		redirect('serveur_down.php');
	}elseif($result['code'] == 200){	
		setFlash("Votre publication a bien été modifiée");
		redirect('afficherphoto.php?id='.$post);
	}else{
		setFlash('Nos services sont en panne, nous faisons notre possible pour régler le problème.','danger');
		redirect('serveur_down.php');
	}
