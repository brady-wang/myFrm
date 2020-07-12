<?php


namespace Core\Lib;

class Route
{

	public $controller;
	public $method;

	public function __construct()
	{
		/*
		 xxx.com/index.php/user/index
		隐藏index.php  通过nginx
		获取url参数部分
		返回控制器和方法
		*/

		$default_controller = Config::get("default_controller","route");
		$default_method = Config::get("default_method","route");

		if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != "/") {
			//  user/index?id=122

			$path = $_SERVER['REQUEST_URI'];
			$arr = explode("/", trim($path, "/"));
			if (isset($arr[0])) {
				$this->controller = $arr[0];
				unset($arr[0]);
			}

			if (isset($arr[1])) {
				$this->method = $arr[1];
				unset($arr[1]);
			} else {
				$this->method = $default_method;
			}


			// user/index/id/2/name/test
			if (!empty($arr)) {
				$count = count($arr) + 2;
				$i = 2;
				while ($i < $count) {
					if (isset($arr[$i + 1])) {
						$_GET[$arr[$i]] = explode("?",$arr[$i + 1])[0];
					}

					$i = $i + 2;
				}
			}
		} else {
			$this->controller = $default_controller;
			$this->method = $default_method;
		}

		// 处理自带的get参数
		$this->controller = explode("?",$this->controller)[0];
		$this->method = explode("?",$this->method)[0];

		return ['controller' => $this->controller, 'method' => $this->method];
	}
}