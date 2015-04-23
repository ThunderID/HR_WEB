<?php namespace App\APIConnector\INENGINE;

use Session;

class APIDocument {

	function index($page, $search, $sort, $all = false)
	{
		$data = new \ThunderID\Doclate\Controllers\DocumentController;
		return $data->index($page, $search, $sort, $all = false);
	}

	function show($id)
	{
		$data = new \ThunderID\Doclate\Controllers\DocumentController;
		return $data->show(Session::get('user.organisation'), $id);
	}

	function store($id, $attributes)
	{		
		$data = new \ThunderID\Doclate\Controllers\DocumentController;
		return $data->store($id, $attributes);
	}

	function destroy($id)
	{
		$data = new \ThunderID\Doclate\Controllers\DocumentController;
		return $data->destroy(Session::get('user.organisation'), $id);
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
