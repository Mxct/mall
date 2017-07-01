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
        return $this->fetch();
    }
    // 服务
    public function fuwu()
    {
        return $this->fetch();
    }
    // 专卖店
    public function zhuanmaidian()
    {
        return $this->fetch();
    }
    // 社区
    public function shequ()
    {
        return $this->fetch();
    }
    // 底部
    public function footer()
    {
        return $this->fetch();
    }
}
