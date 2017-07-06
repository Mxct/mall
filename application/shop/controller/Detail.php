<?php
namespace app\shop\controller;

use think\Controller;	//引入Controller类
use think\Cookie;      //Cookie类
use app\shop\model\Goods;//Goods
class Detail extends Controller
{
	// 官网首页
    public function index()
    {
    	if(input('get.id')){
    		$id = input('get.id');
    		$Ginfo = Goods::get($id);
    		$this->assign('Ginfo',$Ginfo);
    		return $this->fetch();
    	}else{
    		$this->error('非法操作');
    	}
    }
}
