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
		
		$pages = getPostPages($post);
		
		//Si on a des commentaires sur le post, on les récupère
		if($pages > 0)
		{
			if(isset($_GET['page']))
			{
				$comments = getComments($post,$_GET['page']);
			}else{
				$comments = getComments($post);
			}
			$comments=$comments->comments;
		}
		
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
	$author = getUser($infopost->user_id);

	
	getHeader();
?>


<article>
	<!-- Contenu de la page -->
	<div class="contenu">
		<div class="contenu_static">
			<?php if (!($user !== $author['id'])): ?>
				<button class="btn btn-primary">
					<a href="modifierphoto.php?id=<?=$post;?>">Modifier cette publication</a>
				</button>
				<button class="btn btn-danger">
					<a  href="supprimerphoto.php?id=<?=$post;?>" >Supprimer cette publication</a>
				</button>
			<?php endif ?>
			<hr>
			<section id="photo">
				<img src="http://api-rest-youcef-m.c9.io<?=$infopost->chemin?>" style="max-width: 1024px;max-height: 700px;">
				<p>
				<?= '<b>Titre : </b>'.$infopost->titre.'<br/>'; ?> 

				<?php if ($user !== $author['id'] ): ?>
					<b> Auteur : </b><a href="profil.php?id=<?= $author['id']; ?>"> <?=  $author['username']  ;?> </a><br/>
				<?php else: ?>
					<b> Auteur : </b> <a href="profil.php?id=<?= $author['id']; ?>"> Vous </a><br/>
				<?php endif ?>
					

				<?= '<b>Description : </b>'.$infopost->description.'<br/>';?>
				<?= '<b>Date de publication : </b>'.$infopost->created_at;?>
				</p>
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

				<?php if ($pages > 0): ?>
				<hr>
				<p>
					<?php foreach ($comments as $k => $v): ?>
						<?='<b>'.getUser($v->id)['username'].'</b> a dit : '.$v->content.'<br/><i>'.$v->created_at.'</i>'.'<br/>_________________________<br/><br/>';?>
					<?php endforeach ?>
				</p>
				<nav>
				  <ul class="pagination">
				    <li>
					    </li>
					   		<?php for($v=1;$v<=$pages;$v++): ?>
					   			<li><a href="afficherphoto.php?page=<?= $v; ?>"><?= $v; ?></a></li>
					   		<?php endfor?>
					    <li>
				    </li>
				  </ul>
				</nav>
				<hr>
				<?php endif ?>

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
