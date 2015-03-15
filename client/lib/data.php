<?php
	
	/**
	 * Recuperation de donnees
	 */
	function getVote($page = 1)
	{
		$url = 'http://api-rest-youcef-m.c9.io/post/feed/vote';
		$fields = [
			'page' => urlencode($page),
		];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);

	}

	function getLatest($page = 1)
	{
		$url = 'http://api-rest-youcef-m.c9.io/post/feed/latest';
		$fields = [
			'page' => urlencode($page),
		];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	function getFollowFeed($id,$page = 1)
	{
		$url = 'http://api-rest-youcef-m.c9.io/post/feed/'.$id.'/follow';
		$fields = [
			'page' => urlencode($page),
		];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	function getFriendFeed($id,$page = 1)
	{
		$url = 'http://api-rest-youcef-m.c9.io/post/feed/'.$id.'/friend';
		$fields = [
			'page' => urlencode($page),
		];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	function userPosts($id,$page=1)
	{
		$url = 'http://api-rest-youcef-m.c9.io/posts/'.$id;
		$fields = [
			'page' => $page
		];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	function getComments($id)
	{
		$url = 'http://api-rest-youcef-m.c9.io/comments/bypost/'.$id;
		$fields = [];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}


	/**
	 * Recuperation d'informations
	 */
	function getPages($page = 1)
	{
		$url = 'http://api-rest-youcef-m.c9.io/post/pages';
		$fields = [];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	function getInfoPost($id)
	{
		$url = 'http://api-rest-youcef-m.c9.io/post/show/'.$id;
		$fields = [];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}
	
	function getNbLikes($id)
	{
		$url = 'http://api-rest-youcef-m.c9.io/vote/likes/'.$id;
		$fields = [];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}
	
	function getNbDislikes($id)
	{
		$url = 'http://api-rest-youcef-m.c9.io/vote/dislikes/'.$id;
		$fields = [];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	function userPages($id)
	{
		$url = 'http://api-rest-youcef-m.c9.io/post/pages/'.$id;
		$fields = [];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	function followFeedPages($id)
	{
		$url = 'http://api-rest-youcef-m.c9.io/post/follow/pages/'.$id;
		$fields = [];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	function friendFeedPages($id)
	{
		$url = 'http://api-rest-youcef-m.c9.io/post/friend/pages/'.$id;
		$fields = [];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	