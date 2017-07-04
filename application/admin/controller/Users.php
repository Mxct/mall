<?php
namespace app\admin\controller;

use think\Controller;	//引入Controller类
use think\Db;
use app\admin\model\User as UserModel;
use think\Paginator;

class Users extends Controller
{
	// 用户
    public function index()
    {
        return $this->fetch();
    }
    // 用户添加
    public function store()
    {
        return $this->fetch();
    }

}
