<?php
namespace app\admin\controller;

use think\Controller;	//引入Controller类
use think\Db;
use app\admin\model\Type as TypeModel;
use app\index\model\Profile;
use think\Paginator;
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
    //添加类型
    public function store()
    {
    	//添加类型
    	if($_POST){
    		$newTname = input('tname');
    		$type = new TypeModel();
			$type->tname = $newTname;
			$upresult = $type->save();
			if($upresult){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
    	}	
        return $this->fetch();
    }
    //修改类型
    public function edit()
    {
    	//获取所有get变量
    	$id = input('id');
    	$tname = Db::name('type')->find($id);
    	$this->assign('tname',$tname);
    	if($_POST){
    		$Upid = input('id');
    		$newTname = input('tname');
    		$type = TypeModel::get($Upid);
			$type->tname = $newTname;
			$upresult = $type->save();
			if($upresult){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
    	}	
        return $this->fetch();
    }
    //删除类型
    public function del()
    {
    	//获取id变量
    	$id = input('id');
    	$delType = TypeModel::get($id);
		$delResult = $delType->delete();
		if($delResult){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}
    }
    
}
