<?php
	include 'include.php';
	isAllowed();
	function getLatest($page = 1)
	{
		$url = 'http://api-rest-youcef-m.c9.io/post/feed/latest';
		$fields = [
			'page' => urlencode($page),
		];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);

	}
	$content = getLatest();
	$content = $content->latest_feed;
	//dd($content);
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
		<h1>Les dernières publications</h1>

		<section id="photos">
			<ul id="inedit">
			<?php foreach ($content as $k => $v): ?>
				<li><a href="afficherphoto.php?id=<?= $v->id?>"> <img src="http://api-rest-youcef-m.c9.io<?= $v->chemin;?>"></a></li>
			<?php endforeach ?>
			</ul>
		</section>

		<hr>


<?php
	include 'partials/footer.php';
?>