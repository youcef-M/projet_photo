<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Bienvenue sur Pascagram</title>
		<link rel="stylesheet" type="text/css" href="css/reset-design.css" />
		<link rel="stylesheet" type="text/css" href="css/main.css" media="all">
		<!--<link rel="stylesheet" type="text/css" href="form_inscription/view.css" media="all">
		<script type="text/javascript" src="form_inscription/view.js"></script>-->
    </head>

    <body>
		<header><h1 id="pascagram">Pascagram</h1></header>
		<section id="inscription">
		<form id="form_978276" class="appnitro" enctype="multipart/form-data" method="post" action="inscription.php">
		<h2>Inscription</h2>	
			<ul >
				<li id="li_1" >
					<label class="description" for="element_1">Pseudo </label>
					<div>
						<input id="element_11" name="element_11" type="text" maxlength="255" value=""/> 
					</div> 
				</li>		
				
				<li id="li_2" >
					<label class="description" for="element_2">Mot de passe </label>
					<div>
						<input id="element_12" name="element_12" type="text" maxlength="255" value=""/> 
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