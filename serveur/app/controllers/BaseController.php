<?php

class BaseController extends Controller {
	
	protected $validation;
	
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	
	public static function httpOk()
	{
		return Response::json(HTTP_OK, 200);
	}
	
	public static function httpNotFound()
	{
		return Response::json(HTTP_NOT_FOUND, 404);
	}
	
	public static function httpError($validator)
	{
		return Response::json($validator->errors(), 400);
	}
	
	public static function httpExist()
	{
		return Response::json(HTTP_EXIST,409);
	}
	
	
	public static function httpContent($content,$name = null)
	{
		if(is_null($name))
		{
			return Response::json($content, 200);
		}else{
			return Response::json(array($name => $content), 200);
		}
		
	}
}
