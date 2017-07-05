<?php
namespace app\admin\controller;

use think\Controller;	//引入Controller类
use think\Db;
use app\admin\model\User as UserModel;  //用户模型
use app\admin\model\Address;        //引入收货地址的模型
use think\Paginator; //引入分页类

class Users extends Controller
{
	// 用户列表
    public function index()
    {
        // 选择非管理员用户展示
        $list = UserModel::where('type','0')->paginate(3);
        $this->assign('list',$list);
        return $this->fetch();
    }
    // 用户编辑
    public function useredit()
    {
        // 通过获取的id修改对应用户的资料
        if(!empty(input(''))) {
            $id = input('param.id');
            if($id) {
                $user = UserModel::get($id);
                $list = $user->toArray();
                $this->assign('list',$list);
            }
        }
        return $this->fetch();
    }
    // 用户收货地址管理
    public function address()
    {
        $list= Address::where('')->paginate(3);
        $this->assign('list',$list);
        return $this->fetch();
    }

}
