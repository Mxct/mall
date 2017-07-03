<?php
namespace app\admin\controller;

use think\Controller;	//引入Controller类
use think\Db;
class Category extends Controller
{
	// 分类
    public function index()
    {
        return $this->fetch();
    }
    // 添加分类
    public function store()
    {
        return $this->fetch();
    }
}
