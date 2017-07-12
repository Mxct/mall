<?php
namespace app\admin\controller;

use think\Controller;	//引入Controller类
use think\Db;
use app\admin\model\User;
use app\admin\model\Order as OrderModer;
use app\admin\model\Address;
use app\admin\model\Attr;
use app\admin\model\Usertoadd;
class Order extends Controller
{
	//全部订单
    public function index()
    {

        // 全部订单
        $order = OrderModer::paginate('2');
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

    // 待审核,
    public function pending()
    {
        $order = OrderModer::where('status','0')->paginate('2');
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

    // 未付款
    public function unpaid()
    {
        $order = OrderModer::where('status','1')->paginate('2');
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

    // 等待发货
    public function deliver()
    {
        $order = OrderModer::where('status','2')->paginate('2');
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

    // 等待收货
    public function receiving()
    {
        $order = OrderModer::where('status','3')->paginate('2');
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
    // 
    public function orderinfo()
    {
        // 获取该订单的全部信息
        $id = input('get.id');
        $order = OrderModer::get($id);
        // 获取该用户名
        $uid = $order['uid'];
        $username = User::get($uid)->username;
        // 获取该用户地址信息
        $addid = $order['addid'];
        $address = Address::get($addid);
        // 获取手机属性
        $attr = Attr::select();

        // 分配变量
        $this->assign('oredrdata',$order);
        $this->assign('username',$username);
        $this->assign('addressdata',$address);
        $this->assign('attrall',$attr);
        return $this->fetch();
    }

    // 删除订单
    public function orderdel()
    {
        $id = input('get.id');
        $rel = OrderModer::where('id',$id)->delete();
        $this->redirect($_SERVER['HTTP_REFERER']);
    }

    // 修改订单
    public function updeteorder()
    {
        $id = input('post.id');
        $rel = OrderModer::where('id',$id)->update($_POST);
        // dump($rel);
        if($rel){
            $this->success('修改成功');
            // $this->redirect('/admin/order/index');
        }
    }

    // 修改发货状态
    public function send()
    {
        $id = input('get.id');
        $rel = OrderModer::where('id',$id)->update(['status'=>'3']);
        if($rel){
            $this->success('发货成功');
        }
    }
}
