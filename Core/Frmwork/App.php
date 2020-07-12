<?php


namespace Core;


use Core\Lib\Route;

class App
{

	public static $classMap = [];

	public $assign = [];

	// 框架入口 运行
	public static function run()
	{
		$route = new Route();

		$controller = $route->controller;
		$method = $route->method;

		$file  = APP_PATH."Controller/".ucfirst($controller)."Controller.php";

		if(is_file($file)){
			include $file;
			$controller = MODULE."\Controller\\". ucfirst($controller)."Controller";
			(new $controller())->$method();
		} else {
			throw new \Exception("控制器不存在");
		}
	}

	// 自动加载路由
	public static function load($class)
	{
		// $class = Core\Route

		if(isset(self::$classMap[$class])){
			return true;
		} else {

			$class = str_replace("\\","/",$class);

			$file = ROOT_PATH.$class.".php";
			if (is_file($file)){
				include $file;
				self::$classMap[$class] = $class;
			} else {
				return false;
			}

		}

	}

	/**
	 * 将传递过来的值存入数组
	 * @param $name
	 * @param $value
	 */
	public function assign($name,$value)
	{
		$this->assign[$name] = $value;
	}

	public function display($file)
	{
		$file = APP_PATH."View/".$file;
		if(is_file($file)){
			extract($this->assign); // 打散后视图读取变量
			include $file;
		} else{
			throw new \Exception($file." 不存在");
		}
	}
}