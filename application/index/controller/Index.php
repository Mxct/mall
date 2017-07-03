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
        // header('http://mzshop.com/shop/index/index');
        $this->success('hello','shop/index/index');
    }
}
