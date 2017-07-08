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
		// 获取cookie中的uid为用户id
		$id = cookie('uid');
		$list = UserModel::get($id);
		$this->assign('list',$list);
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
	// 用户信息修改
	public function info()
	{
		// 处理修改用户数据,cookie中的uid为用户id
		$id = cookie('uid');
        $user = UserModel::get($id);
        // 用户名修改
        $user->save(['username'=>input('param.username')]);
        // 密码修改
        if(input('param.password')) {
        	$user->save(['password'=>md5(trim(input('param.password')))]);
        }
        // email\phone修改处理
        $user->save(['email'=>input('param.email')]);
        $user->save(['phone'=>input('param.phone')]);

		// 处理上传图片
		$file = request()->file('photo');
        // 判断上传是否成功
        if(isset($file)){
            $info = $file->move(ROOT_PATH . 'public/uploads/icons');
            if($info){
                $a = $info->getSaveName();
                $imgp= str_replace("\\","/",$a);
                $imgpath = '/uploads/icons/'.$imgp;
            } else {
                echo $file->getError();
            }
        	if(!empty($result)){
            	$this->success('修改成功');
        	}else{
            	$this->error('修改失败');
        	}
        	// 保存路径到数据库
        	if(!empty($imgpath)) {
        		$result = $user->save(['photo'=>$imgpath]);
        	}
        	$this->success('个人信息修改成功');
        }
	}
}