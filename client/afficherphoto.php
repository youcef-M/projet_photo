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
			<?php if ($user === $author['id']): ?>
				<button class="btn btn-primary">
					<a href="modifierphoto.php?id=<?=$post;?>">Modifier cette publication</a>
				</button>
				<button class="btn btn-danger">
					<a  href="supprimerphoto.php?id=<?=$post;?>" >Supprimer cette publication</a>
				</button>
				<hr>
			<?php endif ?>
			<h2><?= ucfirst($infopost->titre); ?></h2>
			<section id="photo">
				<img src="http://api-rest-youcef-m.c9.io<?=$infopost->chemin?>" style="max-width: 1024px;max-height: 700px;">
				<p>
				<?php if ($user !== $author['id'] ): ?>
					<b> Auteur : </b><a href="profil.php?id=<?= $author['id']; ?>"> <?=  $author['username']  ;?> </a><br/>
				<?php else: ?>
					<b> Auteur : </b> <a href="profil.php?id=<?= $author['id']; ?>"> Vous </a><br/>
				<?php endif ?>
					

				<?= '<b>Description : </b>'.urldecode($infopost->description).'<br/>';?>
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
						<button class="btn btn-success active">
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
						<button class="btn btn-success active">
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

				<form id="form_commentaires" enctype="multipart/form-data" method="post" action="comment.php?id=<?=$post;?>">
					<ul>
						<li>
							<textarea class="form-control" id="content" name="content" rows=2 cols=30 placeholder="Tapez votre commentaire ici..."></textarea>  
						</li>		
							
						<li>
							<button class="btn ">
								<input id="commenter" type="submit" name="submit" value="Commenter"/>
							</button>
						</li>
					</ul>
				</form>	
				<hr>
				<?php if ($pages > 0): ?>
				<br/>
				<hr>
				<table class="table table-hover">				
					<?php foreach ($comments as $k => $v): ?>
					<tr>
						<td>
							<img  style="height:100px;width:100px;" class="img-circle" src="http://api-rest-youcef-m.c9.io/avatar/<?= $v->user_id; ?>_200x200.jpg" alt="" style="border-radius:50px;"/>
						</td>
						<td>
							<?php if ($v->user_id !== $user): ?>
								<b><?= getUser($v->user_id)['username'];?></b> a dit : 
							<?php else: ?>
								<b> Vous </b> avez dit : 
							<?php endif ?>
						
							<?=urldecode($v->content);?><br/>
						
						<td>
							<i><?=$v->created_at;?></i>
						</td>
						<td>
							<?php if ($v->user_id == $user): ?>
								<button class="btn btn-danger"><a href="">Supprimer mon commentaire</a></button>
							<?php endif ?>
						</td>

					</tr>	
					<?php endforeach ?>	
				</table>
				<nav>
				  <ul class="pagination">
				    <li>
					    </li>
					   		<?php for($v=1;$v<=$pages;$v++): ?>
					   			<li><a href="afficherphoto.php?id=<?=$post;?>&page=<?= $v; ?>"><?= $v; ?></a></li>
					   		<?php endfor?>
					    <li>
				    </li>
				  </ul>
				</nav>
				<hr>
				<?php endif ?>

			
			</section>
		</div>
	</div>
</article>



<?php getFooter(); ?>
