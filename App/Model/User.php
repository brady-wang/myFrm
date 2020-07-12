<?php

namespace App\Model;

use Core\Lib\Model;

class User extends Model
{
	public $table = "users";

	public function lists()
	{
		return $res = $this->select($this->table,"*");
	}

	public function getOne($id)
	{
	    return $this->get($this->table,"*",["id"=>$id]);
	}

	public function updateOne($id,$data)
	{
	    return $this->update($this->table,$data,["id"=>$id])->rowCount();
	}
}