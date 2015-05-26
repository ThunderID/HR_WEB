<?php namespace App\Http\Supports;

use API;

class DeviceAuth 
{
	public static function checking($client, $secret)
	{
		
		$results_2 									= API::api()->index(1, ['client' => $client, 'secret' => $secret, 'withattributes' => ['branch', 'branch.organisation']], [], 1);

		$contents_2 								= json_decode($results_2);

		if(!$contents_2->meta->success)
		{
			return false;
		}

		return $contents_2->data->branch->organisation->id;
	}

	public static function finger($client, $secret)
	{
		
		$results_2 									= API::api()->index(1, ['client' => $client, 'secret' => $secret, 'withattributes' => ['branch', 'branch.fingerprint']], [], 1);

		$contents_2 								= json_decode($results_2);

		if(!$contents_2->meta->success)
		{
			return false;
		}

		$finger 			= [];
		if($contents_2->data->branch->fingerprint->left_thumb)
		{
			$finger[]		= 'left_thumb';
		}
		if($contents_2->data->branch->fingerprint->left_index_finger)
		{
			$finger[]		= 'left_index_finger';
		}
		if($contents_2->data->branch->fingerprint->left_middle_finger)
		{
			$finger[]		= 'left_middle_finger';
		}
		if($contents_2->data->branch->fingerprint->left_ring_finger)
		{
			$finger[]		= 'left_ring_finger';
		}
		if($contents_2->data->branch->fingerprint->left_little_finger)
		{
			$finger[]		= 'left_little_finger';
		}
		if($contents_2->data->branch->fingerprint->right_thumb)
		{
			$finger[]		= 'right_thumb';
		}
		if($contents_2->data->branch->fingerprint->right_index_finger)
		{
			$finger[]		= 'right_index_finger';
		}
		if($contents_2->data->branch->fingerprint->right_middle_finger)
		{
			$finger[]		= 'right_middle_finger';
		}
		if($contents_2->data->branch->fingerprint->right_ring_finger)
		{
			$finger[]		= 'right_ring_finger';
		}
		if($contents_2->data->branch->fingerprint->right_little_finger)
		{
			$finger[]		= 'right_little_finger';
		}

		return $finger;
	}
}