<?php


namespace App\Controller;


use Core\Lib\Config;
use Core\Lib\Model;

class UserController extends BaseController
{

	public function test()
	{

		$this->assign('username',"brady");
		$this->assign('title',"视图");

		$this->display('index.html');
	}

	public function info()
	{
		$model = new Model();

		$sql  = "select * from users";

		$res = $model->query($sql);
		dd($res->fetchAll());
	}
}