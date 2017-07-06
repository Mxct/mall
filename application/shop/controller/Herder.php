<?php
namespace app\shop\controller;

use think\Controller;	//引入Controller类
use think\Cookie;      //Cookie类
class Index extends Controller
{
	// 公共头部
    public function index()
    {
        $this->assign('username',cookie('username'));
        return $this->fetch();
    }
}
