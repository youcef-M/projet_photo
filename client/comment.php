<?php
	include 'include.php';

	if(!isset($_GET['id']))
	{
		setFlash("action impossible.","danger");
		redirect("accueil.php");
		die();
	}

	$user = $_SESSION['profil']['id'];
	$post = $_GET['id'];

	$fields = [
		'content' => $_POST['content'],
		'user_id' => urlencode($user),
		'post_id' => urlencode($post)
	];
	$url = 'http://api-rest-youcef-m.c9.io/comment/new';

	$result = httpPost($fields,$url);
	$result;

	if($result['code'] == 400)
	{
		setFlash("action impossible.","danger");
		redirect('afficherphoto.php?id='.$post);		
	}elseif($result['code'] == 200){	
		
		$user = json_decode($result['content']);
		
		foreach ($user as $k => $v) {
			$_SESSION['profil'][$k] = $v;
		}
		setFlash('Votre commentaire a bien été envoyé');
		redirect('afficherphoto.php?id='.$post);
	}else{
		setFlash('Nos services sont en panne, nous faisons notre possible pour régler le problème.','danger');
		redirect('index.php');
	}
?>