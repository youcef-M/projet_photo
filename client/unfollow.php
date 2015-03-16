<?php
	include 'include.php';
	isAllowed();

	if(!isset($_GET['id']))
	{
		setFlash("action impossible.","danger");
		redirect("accueil.php");
		die();
	}

	$follower = $_SESSION['profil']['id'];
	$following = $_GET['id'];

	$follow = unfollow($follower,$following);

	if($follow == 400)
	{
		setFlash("action impossible.","danger");
		redirect('acceuil.php');		
	}elseif($follow == 500)
	{	
		setFlash('Nos services sont en panne, nous faisons notre possible pour régler le problème.','danger');
		redirect('serveur_down.php');
	}elseif($follow == 200){	
		setFlash("Cette personne a bien été retiré de vos abonnements");
		redirect('profil.php?id='.$following);
	}else{
		setFlash('Nos services sont en panne, nous faisons notre possible pour régler le problème.','danger');
		redirect('serveur_down.php');
	}