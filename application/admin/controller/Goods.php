<?php
namespace app\admin\controller;

use think\Controller;	//引入Controller类
use think\Db;
use think\Request;
use app\admin\model\Goods as GoodsModel;
class Goods extends Controller
{
	// 商品管理
    public function index()
    {
        // $as = GoodsModel::get(1);
        // $result = $as->status;
        // $result = Db::name('goods')->select();
        // $this->assign('Glist',$result);
        $list = GoodsModel::where('')->paginate(3);
        $this->assign('list',$list);
        return $this->fetch();
    }
    //添加商品
    public function store()
    {
        $Lresult = Db::name('type')->where('pid','0')->select();
        $this->assign('Ldata',$Lresult);
        return $this->fetch();
    }
    // 添加商品判断
    public function addg()
    {
        $file = request()->file('pic');
        $data = input('post.');  
        if(isset($file)){
            $info = $file->move(ROOT_PATH . 'public/uploads/goods');  
            if($info){  
                $a = $info->getSaveName();  
                $imgp= str_replace("\\","/",$a);  
                $imgpath='/uploads/goods/'.$imgp;  
                $data['pic']= $imgpath; 
            }else{  
                echo $file->getError();  
            }
        }else{
            unset($data['pic']);
        }
        $num = new GoodsModel;
        $num1 = $num ->save($data);  
        if($num1){  
            $this->success('添加成功');  
        }else{
            $this->error('添加失败');
        }
    }


    // 删除商品
    public function del()
    {
        $delres = db('goods')->delete(input('get.id'));
        if($delres){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
        return $this->fetch();
    }
    // 编辑商品
    public function edit()
    {
        $id = input('get.id');
        $Lresult = Db::name('type')->where('pid','0')->select();
        $this->assign('Ldata',$Lresult);
        // $result = db('goods')->where('id',$id)->select();
        $goods = new GoodsModel;
        $result = $goods->where('id',$id)->select();
        // var_dump($result);
        foreach ($result as $val) {
            $dres = $val->toArray();
        }
        $this->assign('attr',$dres);
        return $this->fetch();
    }
    // 编辑商品
    public function update()
    {
        $file = request()->file('pic');  
        $data = input('post.');  
        if(isset($file)){  
            // 获取表单上传文件 例如上传了001.jpg  
            // 移动到框架应用根目录/public/uploads/ 目录下  
            $info = $file->move(ROOT_PATH . 'public/uploads/goods');  
            // var_dump($info) ;die;  
            if($info){  
                // 成功上传后 获取上传信息  
                $a = $info->getSaveName();  
                $imgp= str_replace("\\","/",$a);  
                $imgpath='/uploads/goods/'.$imgp;  
                $data['pic']= $imgpath; 
            }else{  
                // 上传失败获取错误信息  
                echo $file->getError();  
            }
        }else{
            unset($data['pic']);
        }
        $num = GoodsModel::update($data);  
        if($num){  
            $this->success('更新成功');  
        }else{
            $this->error('更新失败');
        }
    }
}
