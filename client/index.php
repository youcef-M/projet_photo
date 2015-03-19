<?php
	include 'include.php';
	alreadyLogged();
	visitor_header();
?>


<article>
	<!-- Contenu de la page -->
	<div class="contenu">
		<div class="contenu_static">
			<h2>Connexion</h2>
			<form id="form_978276" class="appnitro" enctype="multipart/form-data" method="post" action="connect.php">
				<ul class="formulaire">
					<li>
						<input id="username" name="username" type="text" maxlength="255" value="" placeholder="Nom d'utilisateur"/> 
						<?php error('username'); ?>	
					</li>
					<li>
						<input id="password" name="password" type="password" maxlength="255" value="" placeholder="Mot de passe"/>
						<?php error('password'); ?>	
					</li>
					
					
					<li>
						<input type="submit" value="Connexion" />
						<input type="reset" value="Annuler" />
					</li>
				</ul>
			</form>
		</div>
	</div>
</article>

<?php getFooter(); ?>