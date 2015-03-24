<?php
	include 'include.php';
	isAllowed();

	$id = $_SESSION['profil']['id'];
	$pages = waitingPages($id);
	if($pages > 0)
	{
		if(isset($_GET['page']))
		{
			$content = waiting($id,$_GET['page']);
		}else{
			$content = waiting($id);
		}
		$content = $content->waiting_friends;
	}
	getHeader();
?>

<?php if ($pages > 0): ?>

	<section id="liste">
		<br/><h1>Liste des amis</h1><br/>
		<ul id="listerelation">
			<?php if ($pages > 0): ?>
				<?php foreach ($content as $k => $v): ?>
					<li>
						<a href="profil.php?id=<?= $v->id; ?>" title="">
							<img class="img-circle" src="http://api-rest-youcef-m.c9.io/avatar/<?= $v->id; ?>_200x200.jpg" alt="" style="border-radius:50px;"/>
							<?= $v->username; ?>
						</a>
						<hr>
						<div style="margin-left:-30px;">
							<button class="btn btn-success">
								<a href="activate.php?id=<?=$v->id; ?>"> Accepter</a>
							</button>
							<button class="btn btn-danger">
								<a href="unfriend.php?id=<?=$v->id; ?>"> Supprimer</a>
							</button>

						</div>
					</li>
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
			   			<li>
				   			<a href="amis.php?page=<?= $v; ?>">
				   				<?= $v; ?>
				   			</a>
			   			</li>
			   		<?php endfor?>
		    	<?php endif ?>
			   		
		    <li>
	    </li>
	  </ul>
	</nav>

<?php else: ?>
	<section id="liste">
		<h1>Vous n'avez aucunes demandes</h1>	
	</section>
<?php endif ?>

<?php getFooter(); ?>
