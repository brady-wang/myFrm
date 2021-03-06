<?php

define("ROOT", __DIR__ . "../");

define("PUBLIC_PATH",__DIR__);

define('ROOT_PATH',"../");

define('CORE_PATH',ROOT_PATH."Core/");

define('APP_PATH',ROOT_PATH."App/");

define("MODULE","\app");

define('APP_BUGE',true);

include "../vendor/autoload.php";

if("APP_DEBUG"){
	ini_set("display_errors","on");

	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
} else {
	ini_set("display_errors","off");
}



include CORE_PATH . "Common/base_helper.php";

include CORE_PATH . "Frmwork/App.php";


// 类不存在的时候回自动找到下面的类方法下面
spl_autoload_register("\Core\App::load");

// 启动框架
\Core\App::run();