<?php
namespace app\admin\controller;

use think\Controller;	//引入Controller类
use think\Db;
class Index extends Controller
{
	// 首页
    public function index()
    {
        return $this->fetch();
    }
    // 修改密码
    public function changePass()
    {
        return $this->fetch();
    }
}
