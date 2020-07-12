<?php


namespace Core\Lib;


//class Model extends \PDO
use Medoo\Medoo;

class Model extends Medoo
{
//	public function __construct($dsn = '', $username = '', $passwd = '', $options = [])
//	{
//		$database = Config::all('database');
//		$dsn = $database['dsn'];
//		$username = $database['username'];
//		$passwd = $database['passwd'];
//
//		try {
//
//			parent::__construct($dsn, $username, $passwd, $options);
//
//		} catch (\PDOException $e) {
//
//			dd($e->getMessage());
//
//		}
//
//	}

	public function __construct()
	{

		$options = Config::all("database");
		parent::__construct($options);
	}
}