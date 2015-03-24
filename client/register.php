<?php
	include 'include.php';
	alreadyLogged();
	visitor_header();
?>

<div class="contenu">
	<div class="contenu_static">
		<h2>Créer un nouveau compte</h2>
		<ul class="formulaire">
			<form 	include 'include.php';class="appnitro" enctype="multipart/form-data" method="post" action="inscription.php"
				<ul class="formulaire">
					<li>
						<input id="username" name="username" type="text" maxlength="255" value="" placeholder="Nom d'utilisateur"/> 
						<?php error('username'); ?>	
					</li>	
					<li>
						<input id="email" name="email" type="text" maxlength="255" value="" placeholder="email"/>
						<?php error('email'); ?>
					</li>
					<li>
						<input id="password" name="password" type="password" maxlength="255" value="" placeholder="Mot de passe"/>
						<?php error('password'); ?>	
					</li>
					<li>
						<input type="submit" value="S'inscrire" />
						<input type="reset" value="Annuler" />
					</li>
				</ul>
			</form>
		</ul>
	</div>
</div>


<?php getFooter(); ?>
