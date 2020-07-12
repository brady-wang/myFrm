<?php


namespace App\Controller;


use Core\Lib\Config;

class HomeController extends BaseController
{

	public function index()
	{
		$data = Config::all("route");

		dd($data);
	}
}