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

	function getPages($page = 1)
	{
		$url = 'http://api-rest-youcef-m.c9.io/post/pages';
		$fields = [];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	if(isset($_GET['page']))
	{
		$content = getLatest($_GET['page']);
	}else{
		$content = getLatest();
	}
	
	$content = $content->latest_feed;
	$pages = getPages();
	
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
		<nav><a href="latest.php">Derniers ajout&eacute;s</a>   -   <a href="vote.php">Mieux not&eacute;s</a>   -   <a href="accueil.php">Mes relations</a></nav>
		<h2>Les dernières publications</h2>
		<section id="photos">
			<ul id="inedit">
			<?php foreach ($content as $k => $v): ?>
				<li><a href="afficherphoto.php?id=<?= $v->id?>"> <img src="http://api-rest-youcef-m.c9.io<?= implode("_200x200.",explode(".",$v->chemin));?>"></a></li>
			<?php endforeach ?>
			</ul>
		</section>

		<nav>
		  <ul class="pagination">
		    <li>
		      <a href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
			      </a>
				    </li>
				   		<?php for($v=1;$v<=$pages;$v++): ?>
				   			<li><a href="latest.php?page=<?= $v; ?>"><?= $v; ?></a></li>
				   		<?php endfor?>
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