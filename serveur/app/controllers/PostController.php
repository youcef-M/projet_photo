<?php

use Lib\Validation\Post\PostUpdateValidator 	as PostUpdateValidator;
use Lib\Validation\Post\PostCreateValidator 	as PostCreateValidator;
use Lib\Validation\Post\PostPrivacyValidator 	as PostPrivacyValidator;
use Lib\Validation\GeneralListValidator 		as GeneralListValidator;
use Lib\Gestion\Post\PostGestion 				as PostGestion;
use Lib\Check\Post\PostCheck					as PostCheck;


class PostController extends \BaseController {


	public function __construct(
		PostUpdateValidator 	$update_validation,
		PostCreateValidator 	$create_validation,
		PostPrivacyValidator 	$privacy_validation,
		GeneralListValidator 	$list_validation,
		PostGestion 			$post_gestion,
		PostCheck				$post_check
	){
		$this->update_validation 	= $update_validation;
		$this->create_validation 	= $create_validation;
		$this->privacy_validation 	= $privacy_validation;
		$this->list_validation 		= $list_validation;
		$this->post_gestion 		= $post_gestion;
		$this->post_check			= $post_check;
	}
	
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		if($this->list_validation->fails())
		{
			return BaseController::httpError($this->list_validation);
		}else{
			return BaseController::httpContent($this->post_gestion->index($id),'posts');
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if ($this->create_validation->fails()) {
			return BaseController::httpError($this->create_validation);
		}else{
			$this->post_gestion->store();
			return BaseController::httpOk();
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if($this->post_check->missing($id))
		{
			return BaseController::httpNotFound();
		}else{
			return BaseController::httpContent($this->post_gestion->show($id),'post');
		}
	}



	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if ($this->update_validation->fails($id)) {
			return BaseController::httpError($this->update_validation);
		}else{
			if($this->post_check->missing($id)){
				return BaseController::httpNotFound();
			}else{
				$this->post_gestion->update($id);
				return BaseController::httpOk();
			}
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if($this->post_check->missing($id)){
			return BaseController::httpNotFound();
		}else{
			$this->post_gestion->destroy($id);
			return BaseController::httpOk();
		}
	}
	
	
	/**
	 * Update the privacy for a specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function privacy($id)
	{
		if ($this->privacy_validation->fails($id) ) {
			return BaseController::httpError($this->privacy_validation);
		}else{
			if($this->post_check->missing($id)){
				return BaseController::httpNotFound();
			}else{
				$this->post_gestion->privacy($id);
				return BaseController::httpOk();
			}
		}
	}
	
	
	public function getFeed($id)
	{
		if($this->list_validation->fails())
		{
			return BaseController::httpError($this->list_validation);
		}else{
			if($this->post_check->missingUser($id))
			{
				return BaseController::httpNotFound();
			}else{
				return BaseController::httpContent($this->post_gestion->getFeed($id),'follow_posts');
			}
		}
	}
	
	public function friendsFeed($id)
	{
		if($this->list_validation->fails())
		{
			return BaseController::httpError($this->list_validation);
		}else{
			if($this->post_check->missingUser($id))
			{
				return BaseController::httpNotFound();
			}else{
				return BaseController::httpContent($this->post_gestion->friendsFeed($id),'friends_posts');
			}
		}
	}
}
