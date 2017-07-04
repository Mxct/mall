<?php
namespace app\index\controller;

use think\Request;
use think\Controller;
use think\Db;

//通常控制器都需要继承自think\Controller
class Index extends Controller
{

   // 官网首页
    public function index()
    {
    	// 站点关闭信息
		if(IS_CLOSE =='true'){
			$this->redirect('index/index/server');
		}
        //重定向到商城首页
        $this->redirect('shop/index/index');
    }
    // 站点关闭跳转到维护网页
    public function server()
    {
    	return $this->fetch();
    }
}
