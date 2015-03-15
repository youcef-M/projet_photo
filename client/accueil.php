<?php
	include 'include.php';
	isAllowed();
	
	$id = $_SESSION['profil']['id'];
	$pages = friendFeedPages($id);
	if($pages > 0)
	{
		if(isset($_GET['page']))
		{
			$content = getFriendFeed($id,$_GET['page']);
		}else{
			$content = getFriendFeed($id);
		}
		
		$content = $content->friends_posts;
	}
	
	getHeader();
?>
		
	<h2>Les photos de mes relations</h2>
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