<?php

namespace Core\Lib\Driver;

use Core\Lib\Config;

class File
{
	public static $path;

	public function __construct()
	{
		self::$path = Config::get("options","log")['path'];
	}

	public static function info($msg,$params)
	{
		$msg = "[info][".date("Y-m-d H:i:s")."][msg][".$msg."][params]".json_encode($params,JSON_UNESCAPED_UNICODE);
		$file_name = date("Y-m-d").".log";

		if(!is_dir(self::$path)){
			mkdir(self::$path,"777",true);
		}
		file_put_contents(self::$path."/".$file_name,$msg.PHP_EOL,FILE_APPEND);
	}

	public static function error($msg,$params)
	{
		$msg = "[error][".date("Y-m-d H:i:s")."][msg][".$msg."][params]".json_encode($params,JSON_UNESCAPED_UNICODE);
		$file_name = date("Y-m-d").".log";

		if(!is_dir(self::$path)){
			mkdir(self::$path,"777",true);
		}
		file_put_contents(self::$path."/".$file_name,$msg.PHP_EOL,FILE_APPEND);
	}
}