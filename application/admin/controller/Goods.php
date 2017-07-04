<?php
namespace app\admin\controller;

use think\Controller;	//引入Controller类
use think\Db;
use app\admin\model\Goods as GoodsModel;
class Goods extends Controller
{
	// 商品管理
    public function index()
    {
        // $as = GoodsModel::get(1);
        // $result = $as->status;
        $result = Db::name('goods')->select();
        $this->assign('Glist',$result);
        return $this->fetch();
    }
    //添加商品
    public function store()
    {
        if(input('post.')){
            if(!input('post.gname')){
                $this->error('商品名称不能为空');
            }
            if(input('post.pid') == '0'){
                $this->error('未选择分类');
            }
            $goods = new GoodsModel();
            $data = input('post.');
            $adresult = $goods->save($data);
            if($adresult){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
        }
        $Lresult = Db::name('type')->where('pid','0')->select();
        $this->assign('Ldata',$Lresult);
        return $this->fetch();
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


    // 上传
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
        // 成功上传后 获取上传信息
        // 输出 jpg
        echo $info->getExtension();
        // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
        echo $info->getSaveName();
        // 输出 42a79759f284b767dfcb2a0197904287.jpg
        echo $info->getFilename();
        }else{
        // 上传失败获取错误信息
        echo $file->getError();
        }
    }
}
