<?php
namespace app\shop\controller;

use think\Controller;	//引入Controller类
use think\Db;
use app\shop\model\User;//引入user模型
use app\shop\model\Banner;//引入banner模型
use app\shop\model\Goods;//引入banner模型
use think\Request;      //请求类
use think\Cookie;      //Cookie类
class Index extends Controller
{
	// 官网首页
    public function index()
    {
        // 商品分类
        $Lresult = Db::name('type')->where('pid','0')->limit('7')->select();
        $Sresult = Db::name('Goods')->where('pid','<>','0')->select();
        $this->assign('Lresult',$Lresult);
        $this->assign('Sresult',$Sresult);
        // 热卖推荐
        $hotlist = Goods::where('hot','<>','0')->limit(5)->select();
        $this->assign('hotlist',$hotlist);
        // 轮播图片
        $Lbanner = Db::name('banner')->where('status','0')->select();
        $this->assign('banner',$Lbanner);
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
                echo '用户名正确';
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
        $this->success('退出成功','shop/index/index');
    }
    // 用户注册
    public function reg()
    {
        if(input('post.username')){
            // 获取注册数据
            $username = input('post.username');
            $pwd = input('post.password');
            $yzm = input('post.yzm');
            $email = input('post.email');
            // 用户名长度及验证
            $user = new User;
            $idResult = $user->where('username',$username)->value('id');
            // 判断用户名长度
                if(strlen($username) >= 6) {
                    // 判断用户名是否存在
                    if($idResult){
                        $this->error('该用户名已存在') ;
                    }
                } else {
                    $this->error('用户名长度至少6个字符');
                }
            // 密码类型验证，需包含字母，长度6以上
                $regpwd='/[a-zA-Z]/';
                if(strlen($pwd) >= 6) {
                    if (!preg_match($regpwd,$pwd,$match)){
                       $this->error('密码不能纯数字，需包含字母') ;
                    }
                } else {
                    $this->error('密码长度至少6个字符') ;
                }
            // 邮箱判断类型
                $reg = '/\w+@(\w+\.)+(com|cn|net)/';

                if (!preg_match($reg,$email,$match)){
                    $this->error('邮箱格式不对，请重新输入');
                }
            // 验证码验证
            if(!captcha_check($yzm)){
                $this->error('验证码有误,重新输入!');
            } else {
                // 用户数据插入数据库
                $data = [
                            'username' =>$username,
                            'password' =>md5($pwd),
                            'email'    =>$email,
                        ];
                $user->save($data);
                // 设置cookie
                cookie('username',$username,84600);
                cookie('uid',$idResult,84600);
                cookie('usertype','0',84600);
                $this->success('注册成功','shop/index/index');
            }
        }
        return $this->fetch();
    }
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
        // 邮箱类型验证
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
}
