<?php

	include 'include.php';
	isAllowed();

	if(!isset($_GET['id']))
	{
		setFlash("action impossible.","danger");
		redirect("accueil.php");
		die();
	}

	$post = $_GET['id'];
	$user = $_SESSION['profil']['id'];

	if(isset($_GET['first']))
	{
		if($_GET['first'] === '1')
		{
			$var = like($user,$post);
		}elseif($_GET['first'] === '-1')
		{
			dislike($user,$post);
		}else{
			setFlash('Action impossible','danger');
			redirect('accueil.php');
			die();
		}
	}elseif(isset($_GET['new']))
	{
		if($_GET['new'] === '1')
		{
			unvote($user,$post);
			like($user,$post);
		}elseif($_GET['new'] === '-1')
		{
			unvote($user,$post);
			$var = dislike($user,$post);
		}else{
			setFlash('Action impossible','danger');
			redirect('accueil.php');
			die();
		}
	}elseif(isset($_GET['delete']) && $_GET['delete'] === '1')
	{
		$var = unvote($user,$post);
	}else{
		setFlash('Action impossible','danger');
		redirect('accueil.php');
		die();
	}
	setFlash('Vote enregistré');
	redirect('afficherphoto.php?id='.$post);

