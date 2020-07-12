<?php


namespace Core\Lib;


class Log
{
	public static $class;
	/**
	 * 1 存储方式 文件 数据库
	 * 2 写日志
	 */

	public static function init()
	{
		$driver = Config::get("driver",'log');

		$file_name = CORE_PATH."Lib/Driver/".ucfirst($driver).".php";
		include $file_name;

		$class= '\Core\Lib\Driver\\'.ucfirst($driver);

		self::$class = new $class;
	}


	public static function info($msg,$params=[])
	{
		self::$class->info($msg,$params);
	}

	public static function error($msg,$params=[])
	{
		self::$class->error($msg,$params);
	}


}