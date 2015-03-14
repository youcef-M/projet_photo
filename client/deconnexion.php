<?php
	include 'include.php';

	isAllowed();

	$_SESSION['profil'] = [];
	redirect('connexion.php');

	