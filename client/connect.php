<?php

include "postcurl.php";

if (isset($_POST['pseudo']) && isset($_POST['password']))
{
	$pseudo=$_POST['pseudo'];
	$password=$_POST['password'];



	//extract data from the post


	//set POST variables
	$url = 'https://api-rest-youcef-m.c9.io/user/login';
	$fields = array(
							'username' => urlencode($pseudo),
							'password' => urlencode($password),
					);
	$result = postcurl($url,$fields);
	$json = json_decode($result);
}
else
echo "<p> veuillez rentrer un login et un mot de passe </p>";

?>