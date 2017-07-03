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
        //重定向到商城首页
        $this->redirect('shop/index/index');
    }
}
