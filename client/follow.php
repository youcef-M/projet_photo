<?php
	include 'include.php';
	isAllowed();
	
	$id = $_SESSION['profil']['id'];
	$pages = followFeedPages($id);
	if($pages > 0)
	{
		if(isset($_GET['page']))
		{
			$content = getFollowFeed($id,$_GET['page']);
		}else{
			$content = getFollowFeed($id);
		}
		
		$content = $content->follow_posts;
	}
	
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
		<?php nav(); ?>
		<h2>Vos abonnements</h2>
		<section id="photos">
			<ul id="inedit">
			<?php if ($pages > 0): ?>
				<?php foreach ($content as $k => $v): ?>
					<li><a href="afficherphoto.php?id=<?= $v->id?>"> <img src="http://api-rest-youcef-m.c9.io<?= implode("_200x200.",explode(".",$v->chemin));?>"></a></li>
				<?php endforeach ?>
			<?php endif ?>
				
			</ul>
		</section>

		<nav>
		  <ul class="pagination">
		    <li>	        
			    </li>
			    	<?php if ($pages > 0): ?>
			    		<?php for($v=1;$v<=$pages;$v++): ?>
				   			<li><a href="latest.php?page=<?= $v; ?>"><?= $v; ?></a></li>
				   		<?php endfor?>
			    	<?php endif ?>
				   		
			    <li>
		    </li>
		  </ul>
		</nav>
		<hr>

<?php
	include 'partials/footer.php';
?>