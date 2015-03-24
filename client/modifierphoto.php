<?php
	include 'include.php';
	isAllowed();

	if(!isset($_GET['id']))
	{
		setFlash("action impossible.","danger");
		redirect("accueil.php");
		die();
	}
	$post = $_GET['id'];
	$infopost = getInfoPost($post);
	$infopost=$infopost->post;
	$author = getUser($infopost->user_id);
	$user = $_SESSION['profil']['id'];
	if ($user !== $author['id'] )
	{
		setFlash("action impossible.","danger");
		redirect("accueil.php");
		die();
	}
	getHeader();
?>

<article>
	<!-- Contenu de la page -->
	<div class="contenu">
		<div class="contenu_static">
				<section id="photo">
					<img src="http://api-rest-youcef-m.c9.io<?=$infopost->chemin?>" style="width: 1024px;height: 700px;">
				</section>
				<form id="form_978276" class="appnitro" enctype="multipart/form-data" method="post" action="modifier_photo.php?id=<?=$post;?>">
					<ul class="formulaire">
						<li>
							<input id="titre" name="titre" type="text" value="<?= urldecode($infopost->titre);?>" /> 
							<?php error('titre'); ?>	
						</li>
						<li>
							<textarea id="description" name="description" rows=2 cols=40 ><?= urldecode($infopost->description); ?></textarea>
							<?php error('description'); ?>	
						</li>
						<li>
							<input type="submit" value="Envoyer" />
							<input type="reset" value="Annuler" />
						</li>
					</ul>
				</form>
		</div>
	</div>
</article>

<?php getFooter(); ?>
