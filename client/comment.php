<?php
	include 'include.php';

	$fields = [
		'content' => urlencode($_POST['content']),
		'user_id' => urlencode($_POST['user_id']),
		'post_id' => urlencode($_POST['post_id'])
	];
	$url = 
?>