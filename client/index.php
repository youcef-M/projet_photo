<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Bienvenue sur Pascagram</title>
		<link rel="stylesheet" type="text/css" href="css/reset-design.css" />
		<link rel="stylesheet" type="text/css" href="css/main.css" media="all">
    </head>

    <body>
		<header><a href="accueil.php"><img src="images/pascagram.png" alt="" /></a></header>
		<section id="inscription">
		<form id="form_inscription" class="appnitro" enctype="multipart/form-data" method="post" action="inscription.php">
		<h2>Inscription</h2>	
			<ul >
				<li id="li_1" >
					<label class="description" for="pseudo">Pseudo </label>
					<div>
						<input id="pseudo" name="pseudo" type="text" maxlength="255" value=""/> 
					</div> 
				</li>		
				
				<li id="li_2" >
					<label class="description" for="password">Mot de passe </label>
					<div>
						<input id="password" name="password" type="password" maxlength="255" value=""/> 
					</div> 
				</li>		
				
				<li id="li_3" >
					<label class="description" for="mail">Email </label>
					<div>
						<input id="mail" name="mail" type="text" maxlength="255" value=""/> 
					</div> 
				</li>		
				
				<li id="li_4" >
					<label class="description" for="avatar">T&eacute;l&eacute;charger un avatar </label>
					<div>
						<input id="avatar" name="avatar" type="file"/> 
					</div>  
				</li>
			
				<li class="buttons">
					<input type="hidden" name="form_id" value="978276" />
					<input id="saveForm" class="button_text" type="submit" name="submit" value="S'inscrire" />
				</li>
			</ul>
		</form>	
		
		<p>D&eacute;ja inscrit(e) ?</p><a href="connexion.php">Connexion</a>


		</section>
		<footer> 2015. Pascagram</footer>
		
	
    </body>
</html>