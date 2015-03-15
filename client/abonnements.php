<?php
	include 'include.php';
	isAllowed();

	$id = $_SESSION['profil']['id'];
	$id=1;
	$pages = followingPages($id);
	if($pages > 0)
	{
		if(isset($_GET['page']))
		{
			$content = following($id,$_GET['page']);
		}else{
			$content = following($id);
		}
		$content = $content->following;
	}
	
	getHeader();
?>
	<section id="liste">
		<br/><h1>Liste des abonnements</h1><br/>
		<ul id="listerelation">
			<?php if ($pages > 0): ?>
				<?php foreach ($content as $k => $v): ?>
					<li>
						<a href="profil.php?id=<?= $v->id; ?>" title=""><img src="http://api-rest-youcef-m.c9.io/avatar/<?= $v->id; ?>_200x200.jpg" alt=""/>
							<?= $v->username; ?>
						</a>
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
				   			<a href="abonnements.php?page=<?= $v; ?>">
				   				<?= $v; ?>
				   			</a>
			   			</li>
			   		<?php endfor?>
		    	<?php endif ?>
			   		
		    <li>
	    </li>
	  </ul>
	</nav>

<?php
	include 'partials/footer.php';
?>