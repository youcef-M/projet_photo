<?php
	include 'include.php';
	alreadyLogged();
?>

<?php
	include 'partials/header.php';
?>

    <body>
		<header><a href="accueil.php"><img src="images/pascagram.png" alt="" /></a></header>
		<section id="inscription">
		<form id="form_inscription" class="appnitro" enctype="multipart/form-data" method="post" action="inscription.php">
		<h2>Inscription</h2>	
			<ul >
				<li id="li_1" >
					<label class="description" for="username">Pseudo </label>
					<div>
						<input id="username" name="username" type="text" maxlength="255" value=""/> 
						<?php error('username'); ?>	
					</div> 
				</li>		
				
				<li id="li_2" >
					<label class="description" for="password">Mot de passe </label>
					<div>
						<input id="password" name="password" type="password" maxlength="255" value=""/> 
						<?php error('password'); ?>	
					</div> 
				</li>		
				
				<li id="li_3" >
					<label class="description" for="email">Email </label>
					<div>
						<input id="email" name="email" type="text" maxlength="255" value=""/> 
						<?php error('email'); ?>
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
		
<?php
	include 'partials/footer.php';
?>