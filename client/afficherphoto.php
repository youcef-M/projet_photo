<?php
	include 'include.php';
	isAllowed();

	if(isset($_GET['id']))
	{
		$infopost = getInfoPost($_GET['id']);
		$nblikes = getNbLikes($_GET['id']);
		$nbdislikes = getNbDislikes($_GET['id']);
		$comments = getComments($_GET['id']);
		
	}else{
		setFlash("Cette page n'existe pas.","error");
	}

	$infopost=$infopost->post;
	
	getHeader();
?>

	<section id=photo>
		<img src="http://api-rest-youcef-m.c9.io<?=$infopost->chemin?>">
		<p><?= '<b>Titre : </b>'.$infopost->titre.'<br/><b>Description : </b>'.$infopost->description.'<br/><b>Date de publication : </b>'.$infopost->created_at;?></p>
	</section>
	<section id=notation>
		<p><?= '<b>'.$nblikes->likes.' Likes -- '.$nbdislikes->dislikes.' Dislikes</b>'; ?>
	</section>
	<section id=commentaires>
	<hr>
	<p>
		Ici les commentaires
	</p>
	<hr>
	<form id="form_commentaires" class="" enctype="multipart/form-data" method="post" action="comment.php">
		<ul>
			<li>
				<div>
					<textarea name="positive" rows=2 cols=40>Tapez votre commentaire ici...</textarea> 
				</div> 
			</li>		
				
			<li class="buttons">
				<input id="commenter" class="button_text" type="submit" name="submit" value="Commenter"/>
			</li>
		</ul>
	</form>	
	</section>
	<hr>
	<script type="text/javascript" src="popup.js"></script>

<?php
	include 'partials/footer.php';
?>