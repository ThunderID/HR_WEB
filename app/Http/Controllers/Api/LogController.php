<?php namespace App\Http\Controllers\Api;

use \App\Http\Controllers\Controller;
use \ThunderID\Log\Models\Log;
use \ThunderID\Person\Models\Person;
use \ThunderID\Commoquent\Getting;
use \ThunderID\Commoquent\Saving;
use \ThunderID\Commoquent\Deleting;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App, Response;

class LogController extends Controller {

	protected $controller_name 		= 'log';

	/**
	 * login form
	 *
	 * @return void
	 * @author 
	 **/
	public function store()
	{
		$attributes 								= Input::only('application', 'log');
		if(!$attributes['application'])
		{
			return Response::json(['message' => 'Server Error'], 500);
		}

		$api 										= $attributes['application']['api'];
		if($api['client']!='123456789' || $api['secret']!='123456789')
		{
			return Response::json(['message' => 'Server Error'], 500);
		}

		if(!$attributes['log'])
		{
			return Response::json(['message' => 'Server Error'], 500);
		}

		DB::beginTransaction();

		if(isset($attributes['log']))
		{
			$attributes['log']					= (array)$attributes['log'];
			foreach ($attributes['log'] as $key => $value) 
			{
				$log['name']					= $value[1];
				$log['on']						= date("Y-m-d H:i:s", strtotime($value[2]));
				$log['pc']						= $value[3];

				$saved_log 						= $this->dispatch(new Saving(new Log, $log, null, new Person, $value[0]));
				$is_success_2 					= json_decode($saved_log);
				if(!$is_success_2->meta->success)
				{
					print_r($saved_log);exit;
					DB::rollback();
					return Response::json(['message' => 'Server Error'], 500);
				}
			}
		}

		DB::commit();

		return Response::json(['message' => 'Sukses'], 200);
	}
}