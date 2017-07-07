<?php
namespace app\shop\controller;
use think\Controller;
use think\Db;
use app\shop\model\User as UserModel;

class User extends Controller
{
	// 用户个人中心
	public function index()
	{
		return $this->fetch();
	}
	// 用户忘记密码找回
	public function forget()
	{
		if (input('param.')) {
			$name = input('param.username');
			$user =new UserModel;
			// 查询用户名是否存在
			$id = $user->where('username',$name)->value('id');
			if(!$id) {
				$this->error('您的用户名有误，请确认重新输入！');
			}
			// 查询用户邮箱是否正确
			$email = $user->where('username',$name)->value('email');
			if(!$email) {
				$this->error('您的邮箱不匹配，请重新确认！');
			}
			// 查询用户邮箱是否正确
			$phone = $user->where('username',$name)->value('phone');
			if(!$phone) {
				$this->error('您的手机不匹配，请重新确认！');
			}
			// 生成随机密码
			 $secret = randMix();
			// 以上验证均通过后重新设置密码
			$user->save(['password'=>md5(trim($secret))],['id'=>$id]);
			// 设置成功告知客户
			$this->assign('name',$name);
			$this->assign('mima',$secret);
			return $this->fetch();
		}
	}
}