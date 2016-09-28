<?php
namespace Admin\Controller;
use Think\Controller;

class CommentController extends Controller {
	//显示留言
    public function index(){
    	$status['status'] = array('neq',-1);
    	$list = D('Comment')->findAll($status);
    	$this->assign('list',$list);
    	$this->display();

    }
    //显示垃圾留言
    public function is_dele(){
    	$status['status'] = array('eq',-1);
    	$list = D('Comment')->findAll($status);
    	$this->assign('list',$list);
    	$this->display('Comment/index');
    }
    //标为回复
    public function setAnswer($id){
    	if (!$id || !is_numeric($id)) {
			echo "<script>alert('该页面不存在');window.location.href='".U('Comment/index')."'</script>";die;
		}
    	$ret = D('Comment')->setStatusId($id);
    	if(!$ret){
    		echo "<script>alert('回复失败');window.location.href='".U('Comment/index')."'</script>";die;
    	}else{
    		echo "<script>alert('回复成功');window.location.href='".U('Comment/index')."'</script>";die;
    	}
    } 

    //标为垃圾留言
    public function setDele($id){
    	if (!$id || !is_numeric($id)) {
			echo "<script>alert('该页面不存在');window.location.href='".U('Comment/index')."'</script>";die;
		}
    	$ret = D('Comment')->setDeleId($id);
    	if(!$ret){
    		echo "<script>alert('删除失败');window.location.href='".U('Comment/index')."'</script>";die;
    	}else{
    		echo "<script>alert('删除成功');window.location.href='".U('Comment/index')."'</script>";die;
    	}
    } 

    //查找
    public function search($username){
    	if (!$username || !isset($username)) {
			echo "<script>alert('请输入用户名');window.location.href='".U('Comment/index')."'</script>";die;
		}
    	$data['username'] = array("like",'%'.$username.'%');
    	$list = D('Comment')->findAll($data);
    	$this->assign('list',$list);
    	$this->display('Comment/index');
    }

    public function show(){

    }
}