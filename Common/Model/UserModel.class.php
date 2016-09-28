<?php
namespace Common\Model;
use Think\Model;

class UserModel extends Model
{
	public function getUserName($username)
	{
		$User = M("User");
		return $User->where("username = '".$username."'")->find();
		// echo $User->getLastSql();
	}
	
}
?>