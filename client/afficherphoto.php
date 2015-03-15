<?php
	include 'include.php';
	isAllowed();
	$user = $_SESSION['profil']['id'];

	if(isset($_GET['id']))
	{
		$post = $_GET['id'];

		$infopost = getInfoPost($post);
		$nblikes = getNbLikes($post);
		$nbdislikes = getNbDislikes($post);
		$comments = getComments($post);
		$voted = voted($user,$post);
		
		
		if($voted !== 404)
		{
			$note = getNote($user,$post);
		}else{
			$note = 0;
		}

	}else{
		setFlash("Cette page n'existe pas.","danger");
		redirect("accueil.php");
	}

	$infopost=$infopost->post;
	$user = getUser($infopost->user_id);
	getHeader();
?>

	<section id="photo">
		<img src="http://api-rest-youcef-m.c9.io<?=$infopost->chemin?>">
		<p><?= '<b>Titre : </b>'.$infopost->titre.'<br/> <b> Auteur : </b>' . $user['username'] . '<br/> <b>Description : </b>'.$infopost->description.'<br/><b>Date de publication : </b>'.$infopost->created_at;?></p>
	</section>

	<section id="notation">
		<p>
		
			<?php if ($note === 0): ?>
				<button class="btn btn-success">
					<a href="submit_vote.php?id=<?= $post; ?>&first=1">
						<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">
							<?= ' ' . $nblikes->likes; ?>  
						</span>
					</a>
				</button>
				<button class="btn btn-danger" >
				<a href="submit_vote.php?id=<?= $post; ?>&first=-1">
					<span class="glyphicon glyphicon-thumbs-down glyphicon-danger" aria-hidden="true">
						<?= ' ' . $nbdislikes->dislikes; ?>
					</span>
				</a>
				</button>
			<?php endif ?>


			<?php if ($note === 1): ?>
				<button class="btn btn-success">
					<a href="submit_vote.php?id=<?= $post; ?>&delete=1">
						<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">
							<?= ' ' . $nblikes->likes; ?>  
						</span>
					</a>
				</button>
				<button class="btn btn-danger" >
				<a href="submit_vote.php?id=<?= $post; ?>&new=-1">
					<span class="glyphicon glyphicon-thumbs-down glyphicon-danger" aria-hidden="true">
						<?= ' ' . $nbdislikes->dislikes; ?>
					</span>
				</a>
				</button>
			<?php endif ?>


			<?php if ($note === -1): ?>
				<button class="btn btn-success">
					<a href="submit_vote.php?id=<?= $post; ?>&new=1">
						<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">
							<?= ' ' . $nblikes->likes; ?>  
						</span>
					</a>
				</button>
				<button class="btn btn-danger" >
				<a href="submit_vote.php?id=<?= $post; ?>&delete=1">
					<span class="glyphicon glyphicon-thumbs-down glyphicon-danger" aria-hidden="true">
						<?= ' ' . $nbdislikes->dislikes; ?>
					</span>
				</a>
				</button>
			<?php endif ?>
			
		</p>
	</section>











	<section id="commentaires">
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