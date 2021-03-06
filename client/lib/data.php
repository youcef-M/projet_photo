<?php
	
	/**
	 * Recuperation de donnees
	 */

	//Récupérer infos de l'utilisateur {id}
	function getUser($id)
	{
		$url = 'http://api-rest-youcef-m.c9.io/user/show/'.$id;
		$result =  httpGet([],$url);
		return json_decode($result['content'],true);
	}

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

	function getComments($id, $page=1)
	{
		$url = 'http://api-rest-youcef-m.c9.io/comments/bypost/'.$id;
		$fields = [
				'page' => $page
		];
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

	//Récupération de la page pour commentaires par post
	function getPostPages($id,$page=1)
	{
		$url = 'http://api-rest-youcef-m.c9.io/comments/post/pages/'.$id;
		$fields = [];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}
	
	//Récupération de la page pour commentaires par user
	function getUserPages($id,$page=1)
	{
		$url = 'http://api-rest-youcef-m.c9.io/comments/user/pages'.$id;
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

	function followingPages($id)
	{
		$url = 'http://api-rest-youcef-m.c9.io/following/pages/'.$id;
		$fields = [];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	function followersPages($id)
	{
		$url = 'http://api-rest-youcef-m.c9.io/followers/pages/'.$id;
		$fields = [];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	function friendPages($id)
	{
		$url = 'http://api-rest-youcef-m.c9.io/friend/pages/'.$id;
		$fields = [];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	function waitingPages($id)
	{
		$url = 'http://api-rest-youcef-m.c9.io/friends/waiting/pages/'.$id;
		$fields = [];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	function voted($user,$post)
	{
		$url = 'http://api-rest-youcef-m.c9.io/vote/voted';
		$fields = [
			'user_id' => $user,
			'post_id' => $post
		];
		$result = httpGet($fields,$url);
		return json_decode($result['code']);
	}

	function getNote($user,$post)
	{
		$url = 'http://api-rest-youcef-m.c9.io/vote/note';
		$fields = [
			'user_id' => $user,
			'post_id' => $post
		];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	/**
	 * Contenu relations
	 */

	function friends($id,$page = 1)
	{
		$url = 'http://api-rest-youcef-m.c9.io/friends/'.$id;
		$fields = [
			'page' => urlencode($page),
		];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	function waiting($id,$page = 1)
	{
		$url = 'http://api-rest-youcef-m.c9.io/friends/waiting/'.$id;
		$fields = [
			'page' => urlencode($page),
		];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	function following($id,$page = 1)
	{
		$url = 'http://api-rest-youcef-m.c9.io/following/'.$id;
		$fields = [
			'page' => urlencode($page),
		];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	function followers($id,$page = 1)
	{
		$url = 'http://api-rest-youcef-m.c9.io/followers/'.$id;
		$fields = [
			'page' => urlencode($page),
		];
		$result = httpGet($fields,$url);
		return json_decode($result['content']);
	}

	function alreadyFollow($follower,$following)
	{
		$url = 'http://api-rest-youcef-m.c9.io/follower/exist';
		$fields = [
			'follower_id' => $follower,
			'following_id' => $following
		];
		$result = httpGet($fields,$url);
		return json_decode($result['code']);
	}

	function alreadyAsked($user,$asked)
	{
		$url = 'http://api-rest-youcef-m.c9.io/friend/exist';
		$fields = [
			'user_id' => $user,
			'friend_id' => $asked
		];
		$result = httpGet($fields,$url);
		return json_decode($result['code']);
	}

	function follow($follower,$following)
	{
		$url = 'http://api-rest-youcef-m.c9.io/follow/new';
		$fields = [
			'follower_id' => $follower,
			'following_id' => $following
		];
		$result = httpPost($fields,$url);
		return json_decode($result['code']);
	}

	function beFriend($user,$asked)
	{
		$url = 'http://api-rest-youcef-m.c9.io/friend/new';
		$fields = [
			'user_id' => $user,
			'friend_id' => $asked
		];
		$result = httpPost($fields,$url);
		return json_decode($result['code']);
	}

	function activate($user,$asked)
	{
		$url = 'http://api-rest-youcef-m.c9.io/friend/activate';
		$fields = [
			'user_id' => $user,
			'friend_id' => $asked
		];
		$result = httpPut($fields,$url);
		return json_decode($result['code']);
	}

	function unfollow($follower,$following)
	{
		$url = 'http://api-rest-youcef-m.c9.io/follow/delete';
		$fields = [
			'follower_id' => $follower,
			'following_id' => $following
		];
		$result = httpDelete($fields,$url);
		return json_decode($result['code']);
	}

	function unFriend($user,$asked)
	{
		$url = 'http://api-rest-youcef-m.c9.io/friend/delete';
		$fields = [
			'user_id' => $user,
			'friend_id' => $asked
		];
		$result = httpDelete($fields,$url);
		return json_decode($result['code']);
	}

	/**
	 * Sumbit
	 */

	function like($user,$post)
	{	
		$url = 'http://api-rest-youcef-m.c9.io/vote/like';
		$fields = [
			'user_id' => $user,
			'post_id' => $post
		];
		$result = httpPost($fields,$url);
		return json_decode($result['content']);	
	}

	function dislike($user,$post)
	{	
		$url = 'http://api-rest-youcef-m.c9.io/vote/dislike';
		$fields = [
			'user_id' => $user,
			'post_id' => $post
		];
		$result = httpPost($fields,$url);
		return json_decode($result['content']);	
	}

	function unvote($user,$post){	
		$url = 'http://api-rest-youcef-m.c9.io/vote/delete';
		$fields = [
			'user_id' => $user,
			'post_id' => $post
		];
		$result = httpDelete($fields,$url);
		return json_decode($result['content']);	
	}

	function updateVote($user,$post)
	{
		$url = 'http://api-rest-youcef-m.c9.io/vote/update';
		$fields = [
			'user_id' => $user,
			'post_id' => $post
		];
		$result = httpPut($fields,$url);
		return json_decode($result['content']);	
	}