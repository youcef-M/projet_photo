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
		<nav><a href="latest.php">Derniers ajout&eacute;s</a>   -   <a href="vote.php">Mieux not&eacute;s</a>   -   <a href="accueil.php">Mes relations</a></nav>
		<h2>Les photos de mes relations</h2>
		<section id="photos">
			<ul id="inedit">
				<li><a href="afficherphoto.php" title=""><img src="./images/photo.png" alt=""/></a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo.png" alt=""/></a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo.png" alt=""/></a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo.png" alt=""/></a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo.png" alt=""/></a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo.png" alt=""/></a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo.png" alt=""/></a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo.png" alt=""/></a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo.png" alt=""/></a></li>
				<li><a href="afficherphoto.php" title=""><img src="./images/photo.png" alt=""/></a></li>
			</ul>
		</section>
		
		<nav>
		  <ul class="pagination">
		    <li>
		      <a href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
			      </a>
				    </li>
				    <li>
			      <a href="#" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		      </a>
		    </li>
		  </ul>
		</nav>
		<hr>


<?php
	include 'partials/footer.php';
?>