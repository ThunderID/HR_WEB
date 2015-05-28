<?php namespace App\APIConnector\INENGINE;

use Session;

class APIPerson {

	function authenticate($email, $password)
	{
		$data = new \ThunderID\Person\Controllers\AuthController;
		return $data->user($email, $password);
	}

	function check($id)
	{
		$data = new \ThunderID\Person\Controllers\AuthController;
		return $data->person($id);
	}

	function index($page, $search, $sort, $per_page = 12)
	{
		$data = new \ThunderID\Person\Controllers\PersonController;
		return $data->index($page, $search, $sort, $per_page);
	}

	function show($id, $search = [])
	{
		$search['id']		= $id;
		$data = new \ThunderID\Person\Controllers\PersonController;
		return $data->index(1, $search, [], 1);
	}

	function store($id, $attributes)
	{		
		$data = new \ThunderID\Person\Controllers\PersonController;
		return $data->store($id, $attributes);
	}
	
	function destroy($id)
	{
		$data = new \ThunderID\Person\Controllers\PersonController;
		return $data->destroy($id);
	}

	function documentIndex($personid, $page, $search, $sort)
	{
		$data = new \ThunderID\Person\Controllers\DocumentController;
		return $data->index($personid, $page, $search, $sort);
	}

	function documentShow($personid,$id)
	{
		$data = new \ThunderID\Person\Controllers\DocumentController;
		return $data->show($personid,$id);
	}

	function documentDestroy($personid,$id)
	{
		$data = new \ThunderID\Person\Controllers\DocumentController;
		return $data->destroy($personid,$id);
	}

	function relativeDestroy($personid, $id)
	{
		$data = new \ThunderID\Person\Controllers\PersonController;
		return $data->relativedestroy($personid, $id);
	}

	function workIndex($personid, $page, $search, $sort)
	{
		$data = new \ThunderID\Person\Controllers\WorkController;
		return $data->index($personid, $page, $search, $sort);
	}

	function workShow($personid,$id)
	{
		$data = new \ThunderID\Person\Controllers\WorkController;
		return $data->show($personid, $id);
	}

	function workDestroy($personid, $id)
	{
		$data = new \ThunderID\Person\Controllers\WorkController;
		return $data->delete($personid, $id);
	}

	function contactIndex($page, $search, $sort)
	{
		$data = new \ThunderID\Contact\Controllers\ContactController;
		return $data->index($page, $search, $sort);
	}

	function scheduleIndex($page, $search, $sort)
	{
		$data = new \ThunderID\Schedule\Controllers\PersonScheduleController;
		return $data->index($page, $search, $sort);
	}

	function scheduleStore($id, $attributes)
	{		
		$data = new \ThunderID\Schedule\Controllers\PersonScheduleController;
		return $data->store($id, $attributes);
	}

	function scheduleDestroy($personid, $id)
	{		
		$data = new \ThunderID\Schedule\Controllers\PersonScheduleController;
		return $data->delete($personid, $id);
	}

	function workleaveIndex($page, $search, $sort)
	{
		$data = new \ThunderID\Workleave\Controllers\PersonWorkleaveController;
		return $data->index($page, $search, $sort);
	}

	function workleaveStore($id, $attributes)
	{		
		$data = new \ThunderID\Workleave\Controllers\PersonWorkleaveController;
		return $data->store($id, $attributes);
	}

	function workleaveDestroy($personid, $id)
	{		
		$data = new \ThunderID\Workleave\Controllers\PersonWorkleaveController;
		return $data->delete($personid, $id);
	}
}
