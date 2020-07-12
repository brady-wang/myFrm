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
//		$model = new Model();
//
//		$sql  = "select * from users";
//
//		$res = $model->query($sql);
//		dd($res->fetchAll());

		$model = new Model();
		$data = $model->select("users",['id']);
		dump($data);
	}

	public function add()
	{
		$model = new Model();
		$data = $model->insert("users",['name'=>'test','age'=>'333']);
		dump($data);
	}
}