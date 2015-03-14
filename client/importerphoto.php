<?php
	include 'include.php';
	include 'partials/header.php';
?>

    <body>
		<header>
			<a href="accueil.php">Accueil</a>
			<a href="accueil.php"><img src="images/pascagram.png" alt="" /></a>
			<a href="profil.php">Afficher mon profil</a>
			<a href="connexion.php">D&eacute;connexion</a>
		</header>
		<section id="inscription">
		<form id="form_inscription" class="appnitro" enctype="multipart/form-data" method="post" action="importer.php">
		<h2>Importer une photo</h2>	
		<h2>Connexion</h2>	
			<ul >
				<li id="li_1" >
					<label class="description" for="titre">Titre </label>
					<div>
						<input id="titre" name="titre" type="text" maxlength="255" value=""/> 
						<?php if (isset($_SESSION['errors']['titre'])): ?>
							<div class="error"> <?= $_SESSION['errors']['titre']; ?></div>
						<?php endif ?>
					</div> 
				</li>		
				
				<li id="li_2" >
					<label class="description" for="description">Description </label>
					<div>
						<input id="description" name="description" type="text" maxlength="255" value=""/> 
						<?php if (isset($_SESSION['errors']['description'])): ?>
							<div class="error"> <?= $_SESSION['errors']['description']; ?></div>
						<?php endif ?>
					</div> 
				</li>	
				
				<li id="li_3" >
					<label class="description" for="photo">photo </label>
					<div>
						<input id="photo" name="photo" type="file" maxlength="255" value="" style="marging-left:50%;" /> 
						<?php if (isset($_SESSION['errors']['photo'])): ?>
							<div class="error"> <?= $_SESSION['errors']['photo']; ?></div>
						<?php endif ?>
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