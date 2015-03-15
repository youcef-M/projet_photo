<?php
	include 'include.php';

	isAllowed();

	$_SESSION['profil'] = [];
	setFlash('Vous avez bien été déconnecté');
	redirect('connexion.php');

	