<?php
namespace app\admin\controller;

use think\Controller;	//引入Controller类
use think\Db;
use app\admin\model\User;
use app\admin\model\Order as OrderModer;
class Order extends Controller
{
	//全部订单
    public function index()
    {
        // 全部订单
        $order = OrderModer::paginate('2');;
        // dump($order);
        $set=[];
        foreach ($order as $value) {
            $arr1 = $value->toArray();
            // 获取用户名
            $user= User::get($arr1['uid']);
            $username = $user->username;
            array_push($arr1, $username);
            array_push($set, $arr1);
        }
        // dump($set);
        // 分配变量
        $this->assign('orderlist',$set);
        $this->assign('orderC',$order);
        return $this->fetch();
    }
    //单个订单详情
    public function orderinfo()
    {
        return $this->fetch();
    }
}
