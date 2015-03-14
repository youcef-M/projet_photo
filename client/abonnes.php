<?php
	include 'include.php';
	isAllowed();
?>
<?php
	include 'partials/header.php';
?>
    <body>
		<header>
				<a href="accueil.php">Accueil</a>
				<a href="accueil.php"><img src="images/pascagram.png" alt="" /></a>
				<a href="profil.php">Afficher mon profil</a>
				<a href="deconnexion.php">D&eacute;connexion</a>
		</header>
		<?= flash(); ?>
		<section id="liste">
			<br/><h1>Liste des abonn&eacute;</h1><br/>
			<ul id="listerelation">
				<li><a href="afficherphoto.php" title=""><img src="./images/photo100x100.png" alt=""/>@ _ Ici pseudo</a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo100x100.png" alt=""/>@ _ Ici pseudo</a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo100x100.png" alt=""/>@ _ Ici pseudo</a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo100x100.png" alt=""/>@ _ Ici pseudo</a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo100x100.png" alt=""/>@ _ Ici pseudo</a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo100x100.png" alt=""/>@ _ Ici pseudo</a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo100x100.png" alt=""/>@ _ Ici pseudo</a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo100x100.png" alt=""/>@ _ Ici pseudo</a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo100x100.png" alt=""/>@ _ Ici pseudo</a></li>
			</ul>
		</section>


<?php
	include 'partials/footer.php';
?>