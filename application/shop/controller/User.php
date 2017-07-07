<?php
namespace app\shop\controller;
use think\Controller;
use app\shop\model\User as UserModel;

class User extends Controller
{
	// 用户个人中心
	public function index()
	{
		return $this->fetch();
	}
}