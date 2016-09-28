<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
    	if (!$_SESSION['login']) {
    		$this->redirect('Login/index');
    	}
    }
}