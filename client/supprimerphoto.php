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
	$infopost = getInfoPost($post);
	$infopost=$infopost->post;
	$author = getUser($infopost->user_id);
	$user = $_SESSION['profil']['id'];
	if ($user !== $author['id'] )
	{
		setFlash("action impossible.","danger");
		redirect("accueil.php");
		die();
	}



	$url = 'http://api-rest-youcef-m.c9.io/post/delete/' . $post;
	$result = httpDelete([],$url);

	if($result['code'] == 400)
	{
		setFlash('Action impossible');
		redirect('profil.php');		
	}elseif($result['code'] == 500)
	{	
		setFlash('Nos services sont en panne, nous faisons notre possible pour régler le problème.','danger');
		redirect('serveur_down.php');
	}elseif($result['code'] == 200){	
		setFlash("Votre publication a bien été supprimée");
		redirect('profil.php');	
	}else{
		setFlash('Nos services sont en panne, nous faisons notre possible pour régler le problème.','danger');
		redirect('serveur_down.php');
	}
