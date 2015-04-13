<?php namespace App\Http\Controllers;

use Input, Response, Image, Validator, Str;


class GalleryController extends AdminController {

	function __construct() 
	{
		parent::__construct();
	}
	
	public function Upload()
	{				
		if (Input::hasFile('file'))
		{
			$validator = Validator::make(['file' => Input::file('file')], ['file' => 'image|max:500']);
			if (!$validator->passes())
			{
				return Response::json(['message' => $validator->errors()->first()], 500);
			}

			// generate path 
			$path = '/images/' . date('Y/m/d/H') . '/'; 

			// generate filename
			$filename =  str_replace(' ', '-', Input::file('file')->getClientOriginalName());

			$i = 1;
			while (file_exists(public_path() . '/' . $path . $filename))
			{
				$filename = $i . '-' . str_replace(' ', '-', Input::file('file')->getClientOriginalName());
				$i++;
			}
			
			// move uploaded file to path
			Input::file('file')->move(public_path() . '/' . $path,  str_replace(' ', '-', $filename));

			// create 
			$paths['sm'] = asset($this->copyAndResizeImage($path . $filename, 320, 180));
			$paths['md'] = asset($this->copyAndResizeImage($path . $filename, 640, 360));
			$paths['lg'] = asset($this->copyAndResizeImage($path . $filename, 960, 540));
			$paths['ori'] = asset($path .  $filename);

			// return with upload response
			return Response::json(['file' => [
									'name'			=> $filename,
									'thumbnailUrl' 	=> $paths['ori'],
									'url'			=> $paths['ori'],
									'deleteUrl'		=> $paths['ori'],
									'deleteType'	=> 'delete'
									]
					] );
			
		}
	}

}