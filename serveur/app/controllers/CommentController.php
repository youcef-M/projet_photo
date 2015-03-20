<?php

use Lib\Validation\Comment\CommentUpdateValidator	as CommentUpdateValidator;
use Lib\Validation\Comment\CommentCreateValidator 	as CommentCreateValidator;
use Lib\Validation\GeneralListValidator 			as GeneralListValidator;
use Lib\Gestion\Comment\CommentGestion 				as CommentGestion;
use Lib\Check\Comment\CommentCheck					as CommentCheck;
	
class CommentController extends \BaseController {

	public function __construct(
		CommentUpdateValidator 	$update_validation,
		CommentCreateValidator 	$create_validation,
		GeneralListValidator 	$list_validation,
		CommentGestion 			$comment_gestion,
		CommentCheck			$comment_check
	){
		$this->update_validation 	= $update_validation;
		$this->create_validation 	= $create_validation;
		$this->list_validation 		= $list_validation;
		$this->comment_gestion 		= $comment_gestion;
		$this->comment_check		= $comment_check;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param post_id
	 * @return Response
	 */
	public function byPost($id)
	{
		if($this->list_validation->fails())
		{
			return BaseController::httpError($this->list_validation);
		}else{
			if($this->comment_check->missingPost($id)){
				return BaseController::httpNotFound();
			}else{
				return BaseController::httpContent($this->comment_gestion->byPost($id),'comments');
			}
		}
	}
	
	public function postPages($id)
	{
		return ceil(Comment::where('post_id',$id)->count()/10);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @param user_id
	 * @return Response
	 */
	public function byUser($id)
	{
		if($this->list_validation->fails())
		{
			return BaseController::httpError($this->list_validation);
		}else{
			if($this->comment_check->missingUser($id)){
				return BaseController::httpNotFound();
			}else{
				return BaseController::httpContent($this->comment_gestion->byUser($id),'comments_by_user');
			}
		}
	}
	
	
	public function userPages($id)
	{
		return ceil(Comment::where('user_id',$id)->count()/10);
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
			$this->comment_gestion->store();
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
		if($this->comment_check->missing($id))
		{
			return BaseController::httpNotFound();
		}else{
			return BaseController::httpContent($this->comment_gestion->show($id),'comment');
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
			if($this->comment_check->missing($id)){
				return BaseController::httpNotFound();
			}else{
				$this->comment_gestion->update($id);
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
		if($this->comment_check->missing($id)){
			return BaseController::httpNotFound();
		}else{
			$this->comment_gestion->destroy($id);
			return BaseController::httpOk();
		}
	}


}
