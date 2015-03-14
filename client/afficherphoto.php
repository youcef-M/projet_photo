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
		<section id=photo>
			<img src="./images/affichagephoto.png" alt="" onclick="return false"/>
			<p> Ici les infos de la photo </p>
		</section>
		<section id=notation>
		<p> Ici la notation de la photo
		</section>
		<section id=commentaires>
		<hr>
		<p> Ici les anciens commentaires
		
		<hr>
		<form id="form_commentaires" class="" enctype="multipart/form-data" method="post" action="">
			<ul>
				<li>
					<div>
						<textarea name="positive" rows=2 cols=40>Tapez votre commentaire ici...</textarea> 
					</div> 
				</li>		
					
				<li class="buttons">
					<input id="commenter" class="button_text" type="submit" name="submit" value="Commenter" />
				</li>
			</ul>
		</form>	
		</section>
		<hr>
		<script type="text/javascript" src="popup.js"></script>
<?php
	include 'partials/footer.php';
?>