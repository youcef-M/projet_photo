<?php

use Lib\Validation\Comment\CommentUpdateValidator	as CommentUpdateValidator;
use Lib\Validation\Comment\CommentCreateValidator 	as CommentCreateValidator;
use Lib\Gestion\Comment\CommentGestion as CommentGestion;
	
class CommentController extends \BaseController {

	public function __construct(
		CommentUpdateValidator $update_validation,
		CommentCreateValidator $create_validation,
		CommentGestion $comment_gestion
	){
		$this->update_validation = $update_validation;
		$this->create_validation = $create_validation;
		$this->comment_gestion = $comment_gestion;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param post_id
	 * @return Response
	 */
	public function byPost($id)
	{
		$comment = $this->comment_gestion->byPost($id);
		if(is_null($comment)){
			$statusCode = 404;
			$message = HTTP_NOT_FOUND;
		}else{
			$statusCode = 200;
			$message = $comment->toArray();
		}
		return Response::json($message, $statusCode);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @param user_id
	 * @return Response
	 */
	public function byUser($id)
	{
		$comment = $this->comment_gestion->byUser($id);
		if(is_null($comment)){
			$statusCode = 404;
			$message = HTTP_NOT_FOUND;
		}else{
			$statusCode = 200;
			$message = $comment->toArray();
		}
		return Response::json($message, $statusCode);
	}
	

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 if ($this->create_validation->fails()) {
			$statusCode = 404;
			$message = $this->create_validation->errors();
		}else{
			$this->comment_gestion->store();
			$statusCode = 200;
			$message = HTTP_OK;
		}
    	return Response::json($message, $statusCode);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$comment = $this->comment_gestion->show($id);
		if(is_null($comment))
		{
			$statusCode = 404;
			$message = HTTP_NOT_FOUND;
		}else{
			$statusCode = 200;
			$message = $comment->toArray();
		}
		
		return Response::json($message, $statusCode);
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
			$statusCode = 404;
			$message = $this->update_validation->errors();
		}else{
			if(is_null($this->comment_gestion->show($id))){
				$statusCode = 404;
				$message = HTTP_NOT_FOUND;
			}else{
				$this->comment_gestion->update($id);
				$statusCode = 200;
				$message = HTTP_OK;
			}
			
		}
    	return Response::json($message, $statusCode);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(is_null($this->comment_gestion->show($id))){
			$statusCode = 404;
			$message = HTTP_NOT_FOUND;
		}else{
			$this->comment_gestion->delete($id);
			$statusCode = 200;
			$message = HTTP_OK;
		}
		return Response::json($message, $status);
	}


}
