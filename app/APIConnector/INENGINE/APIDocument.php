<?php namespace App\APIConnector\INENGINE;

use Session;

class APIDocument {

	function index($page, $search, $sort, $per_page = 12)
	{
		$data = new \ThunderID\Doclate\Controllers\DocumentController;
		return $data->index($page, $search, $sort, $per_page);
	}

	function show($id, $search=[])
	{
		$search['id']	= $id;
		$data = new \ThunderID\Doclate\Controllers\DocumentController;
		return $data->index(1, $search, [], 1);
	}

	function store($id, $attributes)
	{		
		$data = new \ThunderID\Doclate\Controllers\DocumentController;
		return $data->store($id, $attributes);
	}

	function destroy($org_id, $id)
	{
		$data = new \ThunderID\Doclate\Controllers\DocumentController;
		return $data->delete($org_id, $id);
	}

	function personindex($page, $search, $sort, $all = false)
	{
		$data = new \ThunderID\Doclate\Controllers\DocumentController;
		return $data->personIndex($page, $search, $sort, $all = false);
	}

	function destroytemplate($id)
	{
		$data = new \ThunderID\Doclate\Controllers\TemplateController;
		return $data->destroy(Session::get('user.organisation'), $id);
	}
}
