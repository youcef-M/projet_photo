<?php
	include 'include.php';
	isAllowed();
	function getVote($page = 1)
	{
		$url = 'http://api-rest-youcef-m.c9.io/post/feed/vote';
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
		$content = getVote($_GET['page']);
	}else{
		$content = getVote();
	}
	
	$content = $content->vote_feed;
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
		<h1>Les publications les mieux not&eacute;es</h1>

		<section id="photos">
			<ul id="inedit">
			<?php foreach ($content as $k => $v): ?>
				<li><a href="afficherphoto.php?id=<?= $v->id?>"><img src="http://api-rest-youcef-m.c9.io<?=implode("_200x200.",explode(".",$v->chemin));?>"></a></li>
			<?php endforeach ?>
			</ul>
		</section>
		
		<hr>
				<hr>
		<nav>
		  <ul class="pagination">
		    <li>
		      <a href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
			      </a>
				    </li>
				   		<?php for($v=1;$v<=$pages;$v++): ?>
				   			<li><a href="vote.php?page=<?= $v; ?>"><?= $v; ?></a></li>
				   		<?php endfor?>
				    <li>
			      <a href="#" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		      </a>
		    </li>
		  </ul>
		</nav>


<?php
	include 'partials/footer.php';
?>