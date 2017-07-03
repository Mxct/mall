<?php
namespace app\admin\controller;

use think\Controller;	//引入Controller类
use think\Db;
class Goods extends Controller
{
	// 商品管理
    public function index()
    {
        return $this->fetch();
    }
    //添加商品
    public function store()
    {
        return $this->fetch();
    }
    
}
