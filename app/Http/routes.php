<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function(){
// $check = '$2y$10$X3wYn6Y6alYJLe.b/EmceeXlwtIx8F2.Zn0n2u2rlqKQ0fyAzbOQ2';
// $data = new \App\DAL\Models\PersonBasicInformation;
// $data->fill(['first_name' => 'cemcem']);
// if(!$data->save())
// {
// 	print_r($data->getError());exit;
// }
// print_r(2);
// });
error_reporting(E_ERROR);

require_once('routes_admin.php');

Route::get('home', 'HomeController@index');
// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);

// require_once('routes_api.php'); 
