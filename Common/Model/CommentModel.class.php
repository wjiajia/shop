<?php 
namespace Common\Model;
use Think\Model;

class CommentModel extends Model{
	public function findAll($arr = array())
	{	
		$res = M("Comment")->where($arr)->order('status, addtime desc')->select();
		return $res;
	}

	//根据id修改留言回复状态
	public function setStatusId($id){
		$data['status'] = 1;
    	$res = D('Comment')->where("comment_id='".$id."'")->save($data);
    	return $res;
	}
	public function setDeleId($id){
		$data['status'] = -1;
    	$res = D('Comment')->where("comment_id='".$id."'")->save($data);
    	return $res;
	}


	


}

?>