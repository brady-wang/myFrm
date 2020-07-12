<?php


namespace Core\Lib;


class Config
{

	public static $config;

	public static function get($name, $file)
	{

		$path = $file;

		if (isset(self::$config[$path])) {

			return self::$config[$path][$name];
		} else {
			$file = ROOT_PATH . "Config/" . $file . ".php";
			if (is_file($file)) {
				$config = include $file;
				if (isset($config[$name])) {
					self::$config[$path] = $config;
					return $config[$name];
				} else {
					throw new \Exception("配置" . $name . "不存在");
				}

			} else {
				throw new \Exception("配置文件" . $file . "不存在");
			}

		}
	}

	public static function all($file)
	{
		$path = $file;

		if (isset(self::$config[$path])) {

			return self::$config[$path];
		} else {
			$file = ROOT_PATH . "Config/" . $file . ".php";
			if (is_file($file)) {
				$config = include $file;
				self::$config[$path] = $config;
				return $config;

			} else {
				throw new \Exception("配置文件" . $file . "不存在");
			}

		}
	}
}