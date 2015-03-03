<?php

include "postcurl.php";

if (isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['mail']))
{
	$pseudo=$_POST['pseudo'];
	$password=$_POST['password'];
	$mail=$_POST['mail'];


	//extract data from the post


	$url = 'https://api-rest-youcef-m.c9.io/user/new'; // url nouvel utilisateur
	
	//set POST variables
	$fields = array(
							'username' => urlencode($pseudo),
							'email' => urlencode($mail),
							'password' => urlencode($password),
					);
	$result = postcurl($fields,$url);
	var_dump($result);


}
else
echo "<p> veuillez rentrer vos pseudonymes mot de passe et adresse mail </p>";

?>