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

	$friendship = beFriend($user,$asked);

	if($friendship == 400)
	{
		setFlash("action impossible.","danger");
		redirect('acceuil.php');		
	}elseif($friendship == 500)
	{	
		setFlash('Nos services sont en panne, nous faisons notre possible pour régler le problème.','danger');
		redirect('serveur_down.php');
	}elseif($friendship == 200){	
		setFlash("Votre demande d'ajout en amis a bien été envoyée");
		redirect('profil.php?id='.$asked);
	}else{
		setFlash('Nos services sont en panne, nous faisons notre possible pour régler le problème.','danger');
		redirect('serveur_down.php');
	}