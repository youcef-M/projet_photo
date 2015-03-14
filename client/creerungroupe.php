<?php
	include 'include.php';
	include 'partials/header.php';
?>

    <body>
		<header>
				<p>
					<a href="accueil.php">Accueil</a>
					<a href="accueil.php"><img src="images/pascagram.png" alt="" /></a>
					Bonjour <?php echo $_SESSION['profil']['username']; ?> !
					<a href="profil.php">Afficher mon profil</a>
					<a href="deconnexion.php">D&eacute;connexion</a>
				</p>
		</header>
		<section id="inscription">
		<form id="form_inscription" class="appnitro" enctype="multipart/form-data" method="post" action="inscription.php">
		<h2>Cr&eacute;er un groupe</h2>	
		</section>

		
<?php
	include 'partials/footer.php';
?>