<?php
namespace Home\Controller;
use Think\Controller;
class CommentController extends Controller {
    public function addComment(){
    	$username = trim($_POST['username']);
    	$email = trim($_POST['email']);
    	$subject = trim($_POST['subject']);
    	$message = trim($_POST['message']);
    	if(!$username||!isset($username)||empty($username)){
    		echo "<script>alert('用户名不能为空'); window.loaction.href='".U('Index/index')."#contact-us'</script>";die;
    	}
    	if (!$email || !isset($email) || empty($email) ) {
			echo "<script>alert('邮箱不能为空'); window.location.href='".U('Index/index')."#contact-us'</script>";die;
		}
		if (!$subject || !isset($subject) || empty($subject) ) {
			echo "<script>alert('主题不能为空'); window.location.href='".U('Index/index')."#contact-us'</script>";die;
		}
		if (!$message || !isset($message) || empty($message) ) {
			echo "<script>alert('留言信息不能为空'); window.location.href='".U('Index/index')."#contact-us'</script>";die;
		}

		$_POST['status'] = 0;
		$_POST['addtime'] = time();
		$ret = D("Comment")->add($_POST);
		
		if (!$ret) {
			echo "<script>alert('提交失败'); window.location.href='".U('Index/index')."#contact-us'</script></script>";
		}else{
			echo "<script>alert('提交成功'); window.location.href='".U('Index/index')."#contact-us'</script></script>";

		}

    }
}
