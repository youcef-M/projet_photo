<?php
	include 'include.php';
	isAllowed();

	function getInfoPost($id)
	{
		$url = 'http://api-rest-youcef-m.c9.io/post/show/'.$id;
		$fields = [];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}
	
	function getNbLikes($id)
	{
		$url = 'http://api-rest-youcef-m.c9.io/vote/likes/'.$id;
		$fields = [];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}
	
	function getNbDislikes($id)
	{
		$url = 'http://api-rest-youcef-m.c9.io/vote/dislikes/'.$id;
		$fields = [];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}
	
	if(isset($_GET['id']))
	{
		$infopost = getInfoPost($_GET['id']);
		$nblikes = getNbLikes($_GET['id']);
		$nbdislikes = getNbDislikes($_GET['id']);
	}
	
	$infopost=$infopost->post;
	
?>


<?php
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
			<img src="http://api-rest-youcef-m.c9.io<?=$infopost->chemin?>">
			<p><?php echo '<b>Titre : </b>'.$infopost->titre.'<br/><b>Description : </b>'.$infopost->description.'<br/><b>Date de publication : </b>'.$infopost->created_at;?></p>
		</section>
		<section id=notation>
			<p><?php echo '<b>'.$nblikes->likes.' Likes -- '.$nblikes->likes.' Dislikes</b>'; ?>
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