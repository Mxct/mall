<?php
namespace app\shop\controller;

use think\Controller;	//引入Controller类
use think\Cookie;      //Cookie类
use app\shop\model\User;
use app\shop\model\Cart;
class Cart extends Controller
{
    public function step1()
    {
        $id = cookie('uid');
        $arr = Cart::where('uid',$id)->select();
        // dump($arr);
        foreach ($arr as $value) {
            echo $value['gid'];
        }
        $this->assign('data',$arr);
        return $this->fetch();
    }
    public function step2()
    {
        return $this->fetch();
    }
    public function step3()
    {
        return $this->fetch();
    }
    public function step4()
    {
        return $this->fetch();
    }
}
