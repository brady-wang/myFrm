<?php


namespace App\Controller;


use App\Model\User;
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

		$user = new User();
		//$lists = $user->getOne(1);
		$lists = $user->updateOne(1,['name'=>"333"]);
		//$lists = $user->lists();

		dd($lists);
	}

	public function add()
	{
		$model = new Model();
		$data = $model->insert("users",['name'=>'test','age'=>'333']);
		dump($data);
	}

	public function hello()
	{
		$data = "  ello";

		$this->assign('data',$data);
		$this->display('index.html');
	}

}