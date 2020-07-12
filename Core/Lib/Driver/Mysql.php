<?php

namespace Core\Lib\Driver;

class Mysql
{


	public function __construct()
	{

	}

	public static function info($msg,$params)
	{
		$msg = "[info][".date("Y-m-d H:i:s")."][msg][".$msg."][params]".json_encode($params,JSON_UNESCAPED_UNICODE);

		$model = new \Core\Lib\Model();
		$sql  = "insert into tb_logs(msg,created_at) values(".json_encode($msg,256).",'".date("Y-m-d H:i:s")."')";
		$res = $model->exec($sql);
		return $res;

	}

	public static function error($msg,$params)
	{
		$msg = "[error][".date("Y-m-d H:i:s")."][msg][".$msg."][params]".json_encode($params,JSON_UNESCAPED_UNICODE);

		$model = new \Core\Lib\Model();
		$sql  = "insert into tb_logs(msg,created_at) values(".json_encode($msg,256).",'".date("Y-m-d H:i:s")."')";
		$res = $model->exec($sql);
		return $res;
	}

}