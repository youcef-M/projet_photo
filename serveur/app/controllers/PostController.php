<?php

use Lib\Validation\Post\PostUpdateValidator 	as PostUpdateValidator;
use Lib\Validation\Post\PostCreateValidator 	as PostCreateValidator;
use Lib\Validation\Post\PostPrivacyValidator 	as PostPrivacyValidator;
use Lib\Gestion\Post\PostGestion as PostGestion;


class PostController extends \BaseController {


	public function __construct(
		PostUpdateValidator $update_validation,
		PostCreateValidator $create_validation,
		PostPrivacyValidator $privacy_validation,
		PostGestion $post_gestion
	){
		$this->update_validation = $update_validation;
		$this->create_validation = $create_validation;
		$this->privacy_validation = $privacy_validation;
		$this->post_gestion = $post_gestion;
	}
	
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		return Post::where('user_id',$id);
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
			$this->post_gestion->store();
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
		$post = $this->post_gestion->show($id);
		if(is_null($post))
		{
			$statusCode = 404;
			$message = HTTP_NOT_FOUND;
		}else{
			$statusCode = 200;
			$message = $post->toArray();
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
			if(is_null($this->post_gestion->show($id))){
				$statusCode = 404;
				$message = HTTP_NOT_FOUND;
			}else{
				$this->post_gestion->update($id);
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
		if(is_null($this->post_gestion->show($id))){
			$statusCode = 404;
			$message = HTTP_NOT_FOUND;
		}else{
			$this->post_gestion->destroy($id);
			$statusCode = 200;
			$message = HTTP_OK;
		}
		return Response::json($message, $statusCode);
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
			$statusCode = 404;
			$message = $this->privacy_validation->errors();
		}else{
			if(is_null($this->post_gestion->show($id))){
				$statusCode = 404;
				$message = HTTP_NOT_FOUND;
			}else{
				$this->post_gestion->privacy($id);
				$statusCode = 200;
				$message = HTTP_OK;
			}
		}
		return Response::json($message, $statusCode);
	}
	
	
	public function getFeed($id)
	{
		$user = User::find($id);
		if(is_null($user))
		{
			$statusCode = 404;
			$message = HTTP_NOT_FOUND;
		}else{
			$statusCode = 200;
			$message = $this->post_gestion->getFeed($id)->toArray();
		}
		
		return Response::json($message, $statusCode);
	}
}
