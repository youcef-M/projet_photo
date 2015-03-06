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
		<form id="form_978276" class="appnitro" enctype="multipart/form-data" method="post" action="connect.php">
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
						<input id="element_12" name="password" type="password" maxlength="255" value=""/> 
					</div> 
				</li>		
				
				<li class="buttons">
					<input type="hidden" name="form_id" value="978276" />
					<input id="saveForm" class="button_text" type="submit" name="submit" value="Se connecter" />
				</li>
			</ul>
		</form>	
		
		<p>Pas encore inscrit(e) ?</p><a href="index.php">Inscription</a>


		</section>
		<footer> 2015. Pascagram</footer>
		
	
    </body>
</html>