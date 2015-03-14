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
		<section id="profil">
			<hr>
			<img src="images/avatar.png" alt="" />
			<h1>@_Pseudo</h1>
			<p> Amis, Abonn&eacute;s, Groupes </p>
			<a href="importerphoto.php">Importer une photo</a><br/>
			<a href="creerungroupe.php">Cr&eacute;er un groupe</a><br/>
			<a href="modifierprofil.php">Modifier mes informations</a><br/>
			<hr>
		</section>
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
		<script type="text/javascript" src="popup.js"></script>
<?php
	include 'partials/footer.php';
?>