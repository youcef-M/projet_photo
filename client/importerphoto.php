<?php
	include 'include.php';
	isAllowed();

	getHeader();
?>

<article>
	<!-- Contenu de la page -->
	<div class="contenu">
		<div class="contenu_static">
				<form id="form_978276" class="appnitro" enctype="multipart/form-data" method="post" action="importer.php">
					<ul class="formulaire">
						<li>
							<input id="titre" name="titre" type="text" maxlength="255" value="" placeholder="Titre" /> 
							<?php error('titre'); ?>	
						</li>
						<li>
							<textarea id="description" name="description" rows=2 cols=40 placeholder="Tapez votre description ici..."></textarea>
							<?php error('description'); ?>	
						</li>
						
						<li>
							<input id="photo" name="photo" type="file"/> 
							<?php error('photo'); ?>	
						</li>
						<li>
							<input type="submit" value="Envoyer" />
							<input type="reset" value="Annuler" />
						</li>
					</ul>
				</form>
		</div>
	</div>
</article>

<?php getFooter(); ?>
