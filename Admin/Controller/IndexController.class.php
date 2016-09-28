<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends CommonController {
    public function index(){
        $this->display();
    }
    public function elements(){
    	$this->display();
    }
    public function tab_panel(){
    	$this->display();
    }
    public function chart(){
    	$this->display();
    }
    
}