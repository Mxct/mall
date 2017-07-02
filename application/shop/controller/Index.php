<?php
namespace app\shop\controller;

use think\Controller;	//引入Controller类
use think\Db;
use app\shop\model\User;//引入user模型
use think\Request;      //请求类
use think\Cookie;      //Cookie类
class Index extends Controller
{
	// 官网首页
    public function index()
    {
        // 分配变量cookie-username
        $this->assign('username',cookie('username'));
        return $this->fetch();
    }
    // 用户登陆
     public function login(Request $request)
    {
        // 表单提交
        if(input('post.username')){
            // 获取post数据
            $username = input('post.username');
            $pwd =md5(trim( input('post.password')));
            $yzm = input('post.yzm');
            // 查询user表是否存在对应id
            $user = new User;
            $idResult = $user->where('username',$username)->value('id');
            // 判断用户名是否正确
            if($idResult){
                echo '用户名正确';
            }else {
                echo '用户名错误';
                exit;
            }
            // 查询用户名对应的密码是否正确
            $pwdResult = $user->where('username',$username)->value('password');
            echo $pwdResult;
            if($pwdResult == $pwd) {
                echo '密码正确';
            } else {
                echo '密码错误';
                exit;
            }
            // 查询用户类型type
            $typeResult = $user->where('username',$username)->value('type');
            // 验证验证码是否正确
            if(!captcha_check($yzm)){
            echo '验证失败';
            $this->error('登录验证失败');
            } else {
                // 设置cookie
                cookie('username',$username,84600);
                cookie('uid',$idResult,84600);
                cookie('usertype', $typeResult,84600);
                $this->success('登录成功','shop/index/index');
            }
        }
       return $this->fetch();
    }
    // 用户退出，清楚cookie
    public function logout()
    {
        // 清空cookie
        cookie('username',null);
        cookie('uid',null);
        cookie('usertype',null);
        // 跳转回到商城首页
        // $url = url('/shop/index/index');
        $this->success('退出成功','shop/index/index');
    }
    public function reg()
    {
        return $this->fetch();
    }
}
