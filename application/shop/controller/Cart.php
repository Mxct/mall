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
            $uid = cookie('uid');
            // 查询该用户所有订单
            $arr = Order::where('uid',$uid)->where('status','0')->select();
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
            $arr = User::get($uid);
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
        $this->redirect('shop/cart/jump1');
    }
    public function jump1()
    {
        $this->redirect('shop/cart/step2');
    }
    //提交订单同时修改addid(n)-status(0)
    public function addstatus()
    {
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
        //传递order订单键值
        $arr = input('');
        $set = [];//存每条order
        $set1=[] ; //存总价
        $addid = 0; //存放地址id
        $orderid = 0; //存放地址id
        $time = 0; //存放地址id
        foreach ($arr as $val) {
            $temp = Order::get($val)->toArray();
            array_push($set,$temp);
            //单条订单价格
             $price = $temp['num']*$temp['price'];
            array_push($set1,$price);
            // 拿到一个地址id
            $addid = $temp['addid'];
            // 拿到一个orderid
            $orderid = $temp['orderid'];
            // 拿到一个order-time
            $time = $temp['time'];
        }
        // 获取地址信息
        $address = Address::get($addid);
         // 总价格
        $totalPrice = array_sum($set1);
        $this->assign('set',$set);
        $this->assign('idarr',$arr);
        $this->assign('time',$time);
        $this->assign('totalPrice',$totalPrice);
        $this->assign('address',$address);
        $this->assign('orderid',$orderid);

        return $this->fetch();
    }
    // 用户支付成功，去库存，改变订单状态(清理购物车数据-cart_id)
    public function step4()
    {
        //获取order-id
        $arr = input('');
        //判断cart_id,清除购物车,修改订单状态status-1
        foreach ($arr as $val) {
            Db::name('order')->where('id',$val)->update(['status'=>'2']);
            $cartid = Db::name('order')->where('id',$val)->value('cart_id');
            if(!empty($cartid)) {
                Cartmodel::destroy($cartid);
            }
            // 去goods表库存
            $gid = Db::name('order')->where('id',$val)->value('gid');
            $num2 = Db::name('order')->where('id',$val)->value('num');
            // 原库存
            $num1 = Db::name('goods')->where('id',$gid)->value('num');
            $newNum = $num1 - $num2;
            if($newNum < 0){
                $newNum = 0;
            }
             $goods = Goods::get($gid);
             $goods->save(['num'=>$newNum]);
        }
        //去中间表纯库存，分品类，分配置,每一条order数据都要执行一次
        foreach ($arr as $rel) {
            $order = Order::get($rel);
            $sale['0']=$order->attr1;
            $sale['1']=$order->attr2;
            $sale['2']=$order->attr3;
            $num = $order->num;
            $id = $order->gid;
            // 以下开始查询中间表处理数据
            //$sale客户购买的属性组合， $num客户购买的数量. $id客户购买的产品goods
            $good = Goods::get($id);
            $goodattrs = $good->attr;

            // attrs--mid
            $attrs=[];
            $ids = [];

            // 遍历除所有的key,标志位
            $store = new Goodtoattr;
            $all = $store->where('goods_id',$id)->select();
           foreach ($all as $value) {
                $each = $value->toArray();
                array_push($attrs, $each['attr_id']);
                array_push($ids, $each['id']);
           }
           // dump($attrs);
           // dump($ids);
           $set = array_combine($ids, $attrs);
            // dump($set);
            // 切片3个一个单位
            $mark = array_chunk($set,3,true);//保留key
            // dump($mark);
            $savekey = [];
            foreach ($mark as $value) {
                $mark1=array_values($value);
                $mark2 = array_keys($value);
                if($sale == $mark1){
                    //提取相同属性的商品的键值
                    array_push($savekey,$mark2);
                }
            }
            // dump($savekey);
            // 按照销售的数量去删除数据条数num,得到所有需要删除的键
            $reduce = array_slice($savekey,0,$num);
            // dump($reduce);
            // 转化为一维数组
            $delkey = [];
            foreach ($reduce as $value) {
                foreach ($value as $rel) {
                    array_push($delkey,$rel);
                }
            }

            // 一条条进行删除foreach执行删除
            foreach ($delkey as $value) {
                Db::name('goodtoattr')->where('id',$value)->delete();
            }
            // echo 'ok';
        }

        //用户信息
        $name = cookie('username');
        $this->assign('name',$name);
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
