<?php
	function isLogged()
	{
		if(!isset($_SESSION['profil']))
		{
			return false;
		}else{
			return count($_SESSION['profil']) !== 0;		
		}
	}

	function alreadyLogged()
	{
		if(isLogged()){
			setFlash("Vous etes déjà connecté","danger");
			redirect('accueil.php');
		}
	}
	function isAllowed()
	{
		if(!isLogged()){
			setFlash("Veuillez vous connecter pour pouvoir effectuer cette action.","danger");
			redirect('connexion.php');
		}
	}

	function setFlash($message, $type = 'success'){
		$_SESSION['Flash']['message'] = $message;
		$_SESSION['Flash']['type'] = $type;
	}

	function isFlash(){
		return isset($_SESSION['flash']);
	}

	function flash(){
		if (isset($_SESSION['Flash'])) {
			extract($_SESSION['Flash']);
			unset($_SESSION['Flash']);
			return "<div class='alert alert-$type'>$message</div>";
		}
	}


