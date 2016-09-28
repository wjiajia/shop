<?php 
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller{
	public function index(){
		if($_SESSION['Login']){
			$this->redirect('Index/index');
		}
		if(IS_POST){
			$username = $_POST['username'];
			$password = $_POST['password'];

			if(!trim($username)){
				return $this->error('用户名不能为空',U('Login/index'));
			}

			if(!trim($password)){
				return $this->error('密码不能为空',U('Login/index'));
			}
			$user = D("User");
			$rst = $user->getUserName($username);
			if(!$rst){
				return $this->error('用户名不存在',U('Login/index'));
			}
			
			if ($rst['password'] != getMD5password($password)) {
				
				$user->error = $rst['error']+1;
				$user->where("user_id ='".$rst['user_id']."'")->save();
				if($rst['error']>2){
					return $this->error('密码错误超过三次');
				}
				return $this->error("您的密码填写错误", U("Login/index"));
			}
			$user->error = 0;
			$user->where("user_id ='".$rst['user_id']."'")->save();
			$_SESSION['login'] = $rst;

			return $this->success('登录成功',U('Index/index'));
		}
		$this->display();
	}

	public function logout()
	{
		unset($_SESSION['login']);
		return $this->success('注销登录', U("Login/index"));
	}

}
?>