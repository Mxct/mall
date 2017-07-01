<?php
namespace app\shop\controller;

use think\Controller;	//引入Controller类
use think\Db;
class Index extends Controller
{
	// 官网首页
    public function index()
    {
        return $this->fetch();
    }
    // 用户登陆
     public function login()
    {
       return $this->fetch();
    }
}
