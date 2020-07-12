<?php


namespace Core\Lib;


class Model extends \PDO
{
	public function __construct($dsn='', $username='', $passwd='', $options=[])
	{
		$dsn = "mysql:host=127.0.0.1;dbname=test";
		$username = "root";
		$passwd = "123456";
		try{
			parent::__construct($dsn, $username, $passwd, $options);
		}catch (\PDOException $e){
			dd($e->getMessage());
		}

	}
}