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
        $goods = new GoodsModel;
        if(input('post.')){
            dump(input('post.'));
            $data = input('post.');
            $updgoods = $goods->where('id',input('post.id'))->update($data);
            if($updgoods){
                $this->success('更新成功');
            }else{
                $this->error('更新失败');
            }
        }
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


    // 文件上传提交
    public function up(Request $request)
    {
        // 获取表单上传文件
        $file = $request->file('file');
        if (empty($file)) {
            $this->error('请选择上传文件');
        }
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if ($info) {
            $this->success('文件上传成功：' . $info->getRealPath());
        } else {
            // 上传失败获取错误信息
            $this->error($file->getError());
        }
    }
}
