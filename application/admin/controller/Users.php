<?php
namespace app\admin\controller;

use think\Controller;	//引入Controller类
use think\Db;
use app\admin\model\User as UserModel;  //用户模型
use app\admin\model\Address;        //引入收货地址的模型
use think\Paginator; //引入分页类

class Users extends Controller
{
	// 用户列表
    public function index()
    {
        // 选择非管理员用户展示
        $list = UserModel::where('type','0')->paginate(3);
        $this->assign('list',$list);
        return $this->fetch();
    }
    // 用户编辑
    public function useredit()
    {
        // 通过获取的id修改对应用户的资料
        if(!empty(input(''))) {
            $id = input('param.id');
            if($id) {
                $user = UserModel::get($id);
                $list = $user->toArray();
                $this->assign('list',$list);
            }
        }
        return $this->fetch();
    }
    // 用户收货地址管理
    public function address()
    {
        // 当传递用户id时进查询单用户地址
        // 否则查询所有地址
        if(input('param.id')){
            $id = input('param.id');
            // 获取所有地址
            $list = UserModel::get($id)->address;
            // 统计条数
            $count =count($list);
            $this->assign('count',$count);
            $this->assign('list',$list);
        } else {
            $count = Address::count('id');
            $list= Address::where('')->paginate(3);
            $this->assign('list',$list);
            $this->assign('count',$count);
        }
        return $this->fetch();
    }
     //用户地址修改
    public function addressMdy()
    {

        if (input('param.id')) {
            $id = input('param.id');
            $add = Address::get($id);
            $arr = input('param.');
            unset($arr['id']);
            $add->save($arr);
            // 返回数据
            $this->success('修改成功');
        }
        return $this->fetch();
    }
      //用户地址删除
    public function addressDel()
    {
        $id = input('param.id');
        Address::destroy($id);
        $this->redirect('admin/users/address');
        return $this->fetch();
    }
     // 用户信息修改确认
    public function check()
    {
        $id = input('post.id');
        $type = input('post.type');
        $phone = input('post.phone');
        $email = input('post.email');
        $score = input('post.score');
        $status = input('post.status');
        $pwd = input('post.password');
        // 类型和状态必须是0、1
        $user = UserModel::get($id);
        // 判断类型值0、1
        if($type == '0' || $type == '1'){
            // 判断状态值0、1
            if($status == '0' || $status == '1'){
                // 判断密码是否被重置
                if(!empty($pwd)){
                    $user->password = md5(trim($pwd));
                }
                $user->email = $email;
                $user->phone = $phone;
                $user->type = $type;
                $user->status = $status;
                $user->score = $score+$user->score;
                // $user->isdel = 1;
                // 保存修改返回
                $user->save();
                $this->redirect('admin/users/useredit','id='.$id);
            } else {
                $this->error('用户状态填写错误');
            }
        } else {
            $this->error('用户类型填写错误');
        }
        return $this->fetch();
    }
    // 用户软删除
    public function userdelete()
    {
        if(input('param.id')){
            $id = input('param.id');
            UserModel::destroy($id);
            // 返回列表
            $this->redirect('admin/users/index');
        }
    }
    // 用户回收站
    public function bin()
    {
        // 筛选数据
        $user = new UserModel;
        $list = $user->onlyTrashed()->paginate(1);
        $this->assign('list',$list);
        return $this->fetch();
    }
    // 用户彻底删除
    public function cancel()
    {
        $id = input('param.id');
        $user= new UserModel;
        $user->withTrashed()->where('id',$id)->delete();
        $this->redirect('admin/users/bin');
    }
    // 用户恢复
    public function reset()
    {
        $id = input('param.id');
        // 清空delete_time,恢复用户
        Db::name('user')->where('id',$id)->update(['delete_time'=>null,]);
        $this->redirect('admin/users/bin');
        return $this->fetch();
    }
    // 测试多对多操作
    public function toMany()
    {
        $user = UserModel::get(8);
        // dump($user);
        // $add = Address::get(1);
        $data = [
                    'person'=>'李新',
                    'phone'=>'1358877788',
                    'location'=>'福建泉州',
                    'first'=>'0',
                ];
        // $user->address()->save($data);
        // $user->address()->attach(6);
        // $user->address()->detach(6);
        $add = Address::get(6);
        // $a = $add->user()->username;这是无法实现的，因为本身对多，没有具体指向的用户名
                //dump($user->address);
               // $arr = $user->address;//获取所有对应地址信息
               //  foreach ($arr as $value) {
               //      dump($value->toArray());
               //  }

           $att = $add->user;

        foreach ($att as $value) {
            dump($value->toArray());
        }
    }
}
