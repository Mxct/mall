<?php
namespace app\admin\controller;

use think\Controller;	//引入Controller类
use think\Db;
use app\admin\model\User;

class Index extends Controller
{
	// 首页
    public function index()
    {
         $this->assign('username',cookie('username'));
        return $this->fetch();
    }
    // 修改密码
    public function changePass()
    {
        return $this->fetch();
    }
    // 后台登陆
    public function login()
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
            if(!$idResult){
                $this->error('用户名不正确');
            }
            // 查询用户名对应的密码是否正确
            $pwdResult = $user->where('username',$username)->value('password');

            if($pwdResult !== $pwd) {
                $this->error('密码不正确');
            }
            // 查询用户类型type
            $typeResult = $user->where('username',$username)->value('type');
            // 验证验证码是否正确
            if(!captcha_check($yzm)){
                $this->error('登录验证失败');
            } else {
                // 设置cookie
                cookie('username',$username,84600);
                cookie('uid',$idResult,84600);
                cookie('usertype', $typeResult,84600);
                $this->success('登录成功','admin/index/index');
            }
        }
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
            $typeResult = $user->where('username',$username)->value('type');
            if($typeResult == '1') {
                // 判断用户名是否管理员
                if($idResult){
                    echo '管理用户名正确';
                }else {
                    echo '用户名有误，请重新输入!';
                }
            } else {
                echo '您不是管理员，无法登陆！';
            }
        }

    }
     public function pwdAj()
    {
        // 接收Ajax数据
        // 管理员密码验证
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
    // 后台退出返回商城主页面
    public function logout()
    {
        // 清空cookie
        cookie('username',null);
        cookie('uid',null);
        cookie('usertype',null);
        // 跳转回到商城首页
        $this->success('退出成功，返回商城','shop/index/index');
    }
}
