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
		<nav>Public   ---    Mes relations</nav>
		<section id="photos">
			<ul id="inedit">
				<li><a href="afficherphoto.php" title=""><img src="./images/photo.png" alt=""/></a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo.png" alt=""/></a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo.png" alt=""/></a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo.png"/></a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo.png"/></a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo.png"/></a></li>
			</ul>
		</section>
		<hr>


<?php
	include 'partials/footer.php';
?>