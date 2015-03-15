<?php
	include 'include.php';
	isAllowed();

	if(isset($_GET['page']))
	{
		$content = getVote($_GET['page']);
	}else{
		$content = getVote();
	}
	
	$content = $content->vote_feed;
	$pages = getPages();
	
	getHeader();
?>
	<h2>Les publications les mieux not&eacute;es</h2>
	
	<section id="photos">
		<ul id="inedit">
		<?php foreach ($content as $k => $v): ?>
			<li><a href="afficherphoto.php?id=<?= $v->id?>"><img src="http://api-rest-youcef-m.c9.io<?=implode("_200x200.",explode(".",$v->chemin));?>"></a></li>
		<?php endforeach ?>
		</ul>
	</section>
	
	<hr>
	<hr>

	<nav>
	  <ul class="pagination">
	    <li>
		    </li>
		   		<?php for($v=1;$v<=$pages;$v++): ?>
		   			<li><a href="vote.php?page=<?= $v; ?>"><?= $v; ?></a></li>
		   		<?php endfor?>
		    <li>
	    </li>
	  </ul>
	</nav>


<?php
	include 'partials/footer.php';
?>