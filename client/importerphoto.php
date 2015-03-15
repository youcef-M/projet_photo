<?php
	include 'include.php';

	getHeader();
?>
	<section id="inscription">
		<form id="form_inscription" class="appnitro" enctype="multipart/form-data" method="post" action="importer.php">
		<h2>Importer une photo</h2>
			<ul >
				<li id="li_1" >
					<label class="description" for="titre">Titre</label>
					<div>
						<input id="titre" name="titre" type="text" maxlength="255" value=""/> 
						<?php error('titre'); ?>	
					</div> 
				</li>		
				
				<li id="li_2" >
					<label class="description" for="description">Description</label>
					<div>
						<textarea id="description" name="description" rows=2 cols=40>Tapez votre description ici...</textarea>
						<?php error('description'); ?>	
					</div> 
				</li>	

				<li id="li_3" >
					<label class="description" for="photo">Photo</label>
					<div>
						<input id="photo" name="photo" type="file"/> 
						<?php error('photo'); ?>	
					</div> 
				</li>

				<li class="buttons">
					<input type="hidden" name="form_id" value="978276" />
					<input id="saveForm" class="button_text" type="submit" name="submit" value="Se connecter" />
				</li>
			</ul>
		</form>	
	</section>
		
<?php
	include 'partials/footer.php';
?>