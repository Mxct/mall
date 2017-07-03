<?php
namespace app\admin\controller;

use think\Controller;	//引入Controller类
use think\Db;
class Type extends Controller
{
	// 类型
    public function index()
    {
        $Lresult = Db::name('type')->where('pid','0')->select();
        $Sresult = Db::name('type')->where('pid','<>','0')->select();
    	$this->assign('Ldata',$Lresult);
    	$this->assign('Sdata',$Sresult);
        return $this->fetch();
    }
    public function store()
    {
        return $this->fetch();
    }
    public function edit()
    {
    	//获取所有get变量
    	$id = input('');
    	$tname = Db::name('type')->where('id',$id['id'])->value('tname');
    	// echo "$result";
    	// dump($result);die;
    	$this->assign('tname',$tname);
        return $this->fetch();
    }
}
