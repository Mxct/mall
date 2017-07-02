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
        return $this->fetch();
    }
    // 用户登陆
     public function login(Request $request)
    {
        if(input('post.username')){
            // 获取post数据
            $username = input('post.username');
            $pwd =md5(trim( input('post.password')));
            $yzm = input('post.yzm');
            // 查询user表是否存在对应id
            $user = new User;
            $result = $user->where('username',$username)->value('id');
            // 判断用户名是否正确
            if($result){
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
            // 验证验证码是否正确
            if(!captcha_check($yzm)){
            echo '验证失败';
            $this->error('登录验证失败');
            } else {
                // 设置cookie
                
                $this->success('登录成功','shop/index/index');
            }
        }
       return $this->fetch();
    }
}
