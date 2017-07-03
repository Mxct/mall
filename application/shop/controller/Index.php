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
    // 登录Ajax验证
    public function nameAj()
    {
        // 接收Ajax数据
        // 用户名验证

        if($_GET['username']){
            // 查询数据库
            $username = $_GET['username'];
            $user = new User;
            $idResult = $user->where('username',$username)->value('id');
            // 判断用户名是否正确
            if($idResult){
                echo $username.'用户名正确';
            }else {
                echo '用户名有误，请重新输入!';
            }
        }

    }
    public function pwdAj()
    {
        // 接收Ajax数据
        // 密码验证
        if($_GET['password']){
            $username = $_GET['username'];
            $pwd = md5(trim($_GET['password']));
            // 查询数据库
            $user = new User;
            $pwdResult = $user->where('username',$username)->value('password');
            // 判断用户名是否正确
            if($pwdResult == $pwd){
                echo '密码正确';
            }else {
                echo '密码有误，请重新输入!';
            }
        }
    }
    public function yzmAj()
    {
        // 接收Ajax数据
        // 验证码验证,备注只能验证一次；所以提交表单信息会发生验证错误
        if($_GET['yzm']){
            $yzm = $_GET['yzm'];
            if(!captcha_check($yzm)){
                echo '验证码有误,重新输入!';
            }else {
                echo '验证码正确!';
            }
        }
    }
    // 用户提交登陆
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
                echo '验证失败'.$yzm;
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
<<<<<<< HEAD
=======
    // 用户注册
>>>>>>> ad141490415fecbcf466a4e93774dc819d6736ab
    public function reg()
    {
        return $this->fetch();
    }
<<<<<<< HEAD
=======
     public function regnameAj()
    {
        // 接收regAjax数据
        // 用户名验证

        if($_GET['username']){
            // 查询数据库
            $username = $_GET['username'];
            // 用户名长度
            $len = strlen($username);
            $user = new User;
            $idResult = $user->where('username',$username)->value('id');
            // 判断用户名长度
            if($len >= 6) {
                // 判断用户名是否存在
                if($idResult){
                    echo '该用户名已存在';
                }else {
                    echo '该用户名可以使用!';
                }
            } else {
                echo '用户名长度至少6个字符';
            }

        }
    }
    // 注册密码检验
    public function regpwdAj()
    {
        // 接收Ajax数据
        // 密码类型验证，需包含字母，长度6以上
        if($_GET['password']){
            $pwd = $_GET['password'];
            // 获取长度
            $len = strlen($pwd);
            // 判断类型
            $reg='/[a-zA-Z]/';
            if($len >= 6) {
                if (!preg_match($reg,$pwd,$match)){
                    echo '密码不能纯数字，需包含字母';
                } else {
                    echo '该密码可以使用';
                }
            } else {
                echo '密码长度至少6个字符';
            }
        }
    }
     public function regemailAj()
    {
        // 接收Ajax数据
        // 邮箱类型验证，需包含字母，长度6以上
        if($_GET['email']){
            $email = $_GET['email'];
            // 判断类型
            $reg = '/\w+@(\w+\.)+(com|cn|net)/';

            if (!preg_match($reg,$email,$match)){
                echo '邮箱格式不对，请重新输入';
            } else {
                echo '该邮箱可以使用';
            }
        }
    }
>>>>>>> ad141490415fecbcf466a4e93774dc819d6736ab
}
