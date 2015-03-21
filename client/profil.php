<?php
	include 'include.php';	
	isAllowed();

	
	if(isset($_GET['id']))
	{
		$user = getUser($_GET['id']);
	}else{
		$user = $_SESSION['profil'];	
	}

	$pages = userPages($user['id']);

	if($pages > 0)
	{
		if(isset($_GET['page']))
		{
			$content = userPosts($user['id'],$_GET['page']);
		}else{
			$content = userPosts($user['id']);
		}
		$content = $content->posts;
	}

	if ($user['id'] !== $_SESSION['profil']['id'])
	{
		$follow = alreadyFollow($_SESSION['profil']['id'],$user['id']);
		$friend = alreadyAsked($_SESSION['profil']['id'],$user['id']);
	}
	getHeader();
?>

<article>
	<!-- Contenu de la page -->
	<div class="contenu">
		<div class="contenu_static">
			<hr>
			<?php if ($user['id'] !== $_SESSION['profil']['id']): ?>
				<?php if ($follow === 404): ?>
					<button class="btn btn-primary">
						<a href="abonnement.php?id=<?=$user['id']; ?>">S'abonner au fil d'actualité</a>
					</button>
				<?php else: ?>
					<button class="btn btn-danger active">
						<a href="unfollow.php?id=<?=$user['id']; ?>">Supprimer son abonnement</a>
					</button>
				<?php endif ?>
					
				<?php if ($friend === 404): ?>
					<button class="btn btn-primary">
						<a  href="befriend.php?id=<?=$user['id']; ?>" >Envoyer une demande d'amitié</a>
					</button>
				<?php else: ?>
					<button class="btn btn-danger active">
						<a  href="unfriend.php?id=<?=$user['id']; ?>" >Retirer de votre liste d'amis</a>
					</button>
				<?php endif ?>

			<?php endif ?>
			
			<section id="profil">	
				<br/><img src="http://api-rest-youcef-m.c9.io/avatar/<?= $user['id']; ?>_200x200.jpg" alt="" />
				<h1><?= $user['username']; ?></h1>
				<?php if ($user['id'] == $_SESSION['profil']['id']): ?>
					<p> <a href="amis.php">Amis</a>, <a href="abonnes.php">Abonn&eacute;s</a>, <a href="abonnements.php">Abonnements</a></p>
					<a href="importerphoto.php">Importer une photo</a><br/>
				<?php endif ?>
				<hr>
			</section>
			<section id="photos">
				<ul id="inedit">
					<?php if ($pages > 0): ?>
						<?php foreach ($content as $k => $v): ?>
							<li>
								<a href="afficherphoto.php?id=<?= $v->id?>"> 
									<img src="http://api-rest-youcef-m.c9.io<?= implode("_200x200.",explode(".",$v->chemin));?>" style="border-radius:10px;">
								</a>
							</li>
						<?php endforeach ?>
					<?php endif ?>
					
				</ul>
			</section>
		</div>
	</div>
</article>

<?php if ($pages > 0): ?>
	<nav>
	  <ul class="pagination">
	    <li>
		    </li>
			    
		    	<?php if (isset($_GET['id'])): ?>
			    	<?php for($v=1;$v<=$pages;$v++): ?>
			   			<li><a href="profil.php?page=<?= $v; ?>&id=<?= $_GET['id']; ?>"><?= $v; ?></a></li>
			   		<?php endfor?>
			    <?php else: ?>
			    	<?php for($v=1;$v<=$pages;$v++): ?>
			   			<li><a href="profil.php?page=<?= $v; ?>"><?= $v; ?></a></li>
			   		<?php endfor?>
			    <?php endif ?>
			 
		    <li>
	    </li>
	  </ul>
	</nav>
	<hr>
<?php endif ?>

<?php getFooter(); ?>
