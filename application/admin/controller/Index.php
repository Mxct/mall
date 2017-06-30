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
}
