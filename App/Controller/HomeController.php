<?php


namespace App\Controller;


use Core\Lib\Config;
use Core\Lib\Log;

class HomeController extends BaseController
{

	public function index()
	{

		Log::error("this ;.''''is a get ",['hello','world你好']);
	}
}