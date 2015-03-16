<?php
	include 'include.php';
	isAllowed();

	if(!isset($_GET['id']))
	{
		setFlash("action impossible.","danger");
		redirect("accueil.php");
		die();
	}

	$user = $_SESSION['profil']['id'];
	$asked = $_GET['id'];

	$friendship = unFriend($user,$asked);

	if($friendship == 400)
	{
		setFlash("action impossible.","danger");
		redirect('acceuil.php');		
	}elseif($friendship == 500)
	{	
		setFlash('Nos services sont en panne, nous faisons notre possible pour régler le problème.','danger');
		redirect('serveur_down.php');
	}elseif($friendship == 200){	
		setFlash("Cette personne a bien été retiré de votre liste d'amis");
		redirect('profil.php?id='.$asked);
	}else{
		setFlash('Nos services sont en panne, nous faisons notre possible pour régler le problème.','danger');
		redirect('serveur_down.php');
	}