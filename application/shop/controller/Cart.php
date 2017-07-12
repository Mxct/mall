<?php
namespace app\shop\controller;

use think\Controller;	//引入Controller类
use think\Cookie;      //Cookie类
use think\Db;      //Cookie类
use app\shop\model\User;
use app\shop\model\Cart as Cartmodel;
use app\shop\model\Goodtoattr;//Goodtoattr
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

            // 分配变量
            $this->assign('data',$arr);
            return $this->fetch();
        }else{
            $this->error('请先登陆','shop/index/login');
        }
    }
    // 购物车第二部，生成订单(1.点击立即购买，2.购物车跳转过来)
    public function step2()
    {
        if(cookie('uid')){
            // dump($_POST);
            $id = cookie('uid');
            // 查询该用户所有订单
            $arr = Order::where('uid',$id)->where('status','0')->select();
            // 获取价格总和
            $set = [];//存价格
            $arr1 = [];
            $ids = [];//存放id
            foreach ($arr as $value) {
                $arr2 = $value->toArray();
                array_push($arr1, $arr2);
                //单条订单价格
                $price = $arr2['num']*$arr2['price'];
                array_push($set,$price);
                // 订单ids存在一个数组
                array_push($ids,$arr2['id']);
            }
            $id = $ids;
            //id字符串
            $ids = join(',',$ids);
            // 总价格
            $totalPrice = array_sum($set);
            $this->assign('ids',$ids);
            $this->assign('idarr',$id);
            $this->assign('order',$arr1);
            $this->assign('totalPrice',$totalPrice);
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
            // 点击结算更改已下单，代付款状态，

            return $this->fetch();
        }else{
            $this->error('请先登陆','shop/index/login');
        }
    }
    // 中转页面1->2
    public function jump()
    {
        $this->redirect('shop/cart/step2');
    }
    //提交订单同时修改addid(n)-status(0)
    public function addstatus()
    {
        dump($_GET);
        $addid = $_GET['addid'];
        $id = $_GET['id'];

        // 读出订单信息
        $arr = explode(',',$id);
        //遍历出order对象,更新order字段

        foreach ($arr as $val) {
            Db::name('order')->where('id',$val)->update(['addid'=>$addid]);
            Db::name('order')->where('id',$val)->update(['status'=>'1']);
        }
    }
    // 订单成功，待付款，展示订单页面
    public function step3()
    {
        //传递订单键值
        $arr = input('');
        $set = [];//存每条order
        $set1=[] ; //存总价
        foreach ($arr as $val) {
            $temp = Order::get($val)->toArray();
            array_push($set,$temp);
            //单条订单价格
             $price = $temp['num']*temp['price'];
            array_push($set1,$price);
        }
         // 总价格
        $totalPrice = array_sum($set1);
        $this->assign('set',$set);
        $this->assign('totalPrice',$totalPrice);
        //$this->assign('',$address);

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
    // 删除订单为零的商品
    public function orderdel()
    {
        $id = input('get.');
        Order::get($id)->delete();
        $this->redirect('step2');
    }
    // 结算验证
    public function jiesuanAj()
    {
        var_dump($_GET);
        if($_GET){
            // $data['expire']='3600';
            session('data',$_GET);
            $this->ajaxReturn('yes');
        }else{
            $this->ajaxReturn('no');
        }
    }
    // 将购物车修改数量改数据
    public function demo()
    {

         $data = $_POST;
         dump($data);
        // 把传过来的id
        $b = count($data['id']);
        $set = [];
        for($i = 0;$i<$b;$i++){
            $val = array_column($data,$i);
            array_push($set,$val);
        }

        //  修改商品数量
        foreach ($set as $value) {
            Db::name('cart')->where('id',$value[0])->update(['num'=>$value['1']]);
        }
        // 将数据写到订单表，生成订单
        foreach ($set as $value) {
            $result = Db::name('cart')->where('id',$value[0])->select();
            ;
            $result[0]['cart_id']=$result[0]['id'];
            unset($result[0]['id']);
            unset($result[0]['time']);
            //添加订单号imie
            $imie = new Goodtoattr;
            $rel = $imie->where('goods_id',$result[0]['gid'])->where('imie','<>','')->select();
            $result[0]['orderid']=randMix().($rel[0]->imie);

             //整合数据插入order表
            Db::name('order')->insert($result[0]);
        }
    }
}
