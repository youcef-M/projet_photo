<?php
	function isLogged()
	{
		return count($_SESSION['profil']) !== 0;
	}

	function alreadyLogged()
	{
		if(isLogged()){
			$_SESSION['flash'] = "Vous etes déjà connecté";
			redirect('accueil.php');
		}
	}
	function isAllowed()
	{
		if(!isLogged()){
			$_SESSION['flash'] = "Veuillez vous connecter pour pouvoir effectuer cette action.";
			redirect('connexion.php');
		}
	}


