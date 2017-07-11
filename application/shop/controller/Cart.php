<?php
namespace app\shop\controller;

use think\Controller;	//引入Controller类
use think\Cookie;      //Cookie类
use app\shop\model\User;
use app\shop\model\Cart as Cartmodel;
use app\shop\model\Goods;
use app\shop\model\Address;
use app\shop\model\Order;
class Cart extends Controller
{
    // 购物车第一步
    public function step1()
    {
        if(cookie('uid')){
            $id = cookie('uid');
            // 该用户购物车
            $arr = Cartmodel::where('uid',$id)->select();
            $this->assign('data',$arr);
            return $this->fetch();
        }else{
            $this->error('请先登陆','shop/index/login');
        }
    }
    // 购物车第二部，生成订单
    public function step2()
    {
        if(cookie('uid')){
            $id = cookie('uid');
            // 查询该用户所有订单
            $arr = Order::where('uid',$id)->select();
            $arr1 = [];
            foreach ($arr as $value) {
                $arr2 = $value->toArray();
                array_push($arr1, $arr2);
                // dump($arr2);
            }
            dump($arr1);
            $this->assign('order',$arr1);
            // 查询该用户所有地址
            $arr = User::get($id);
            $arr1 = $arr->address;
            $arr3 = [];
            foreach ($arr1 as $value) {
                $arr2 = $value->toArray();
                array_push($arr3, $arr2);
            }
            // dump($arr3);
            $this->assign('data',$arr3);
            return $this->fetch();
        }else{
            $this->error('请先登陆','shop/index/login');
        }
    }
    public function step3()
    {
        return $this->fetch();
    }
    public function step4()
    {
        return $this->fetch();
    }
    // 删除购物车商品
    public function del()
    {
        $id = input('get.');
        Cartmodel::get($id)->delete();
        $this->redirect('step1');
    }
    // 
    public function update(){
        $post=input('post.');
        // echo json_encode($post);
        //实例化
        $update= new Cartmodel;
        //创建数据对象
        $obj=$update->create();
        //判断
        if($obj){
            $data=$update->save();
            if($data){
                $this->ajaxReturn('yes');
            }else{
                $this->ajaxReturn('no');
            }
        }else{
            $this->ajaxReturn('no');
        }
    }
}
