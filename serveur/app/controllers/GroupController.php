<?php

use Lib\Validation\Group\GroupeCreateValidator 	as GroupCreateValidator;
use Lib\Gestion\Group\GroupGestion 				as GroupGestion;
class GroupController extends \BaseController {

	
	public function __construct(
		
		GroupCreateValidator 	$create_validation,
		GroupGestion			$group_gestion
		
	){
		$this->create_validation 	= $create_validation;
		$this->group_gestion 		= $group_gestion;
		
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
			$this->group_gestion->store();
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
		if($this->group_check->show($id))
		{
			return BaseController::httpNotFound();
		}else{
			return BaseController::httpContent($this->group_gestion->show($id),'group');
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
			if($this->group_check->update($id)){
				return BaseController::httpNotFound();
			}else{
				$this->group_gestion->update($id);
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
		if($this->group_check->destroy($id)){
			return BaseController::httpNotFound();
		}else{
			$this->group_gestion->delete($id);
			return BaseController::httpOk();
		}
	}


}
