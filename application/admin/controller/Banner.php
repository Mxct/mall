<?php
namespace app\admin\controller;

use think\Controller;	//引入Controller类
use think\Db;
use app\admin\model\Banner as BannerModel;
class Banner extends Controller
{
	// 轮播列表
    public function index()
    {
        // 轮播图片
        $Lbanner = Db::name('banner')->select();
        $this->assign('banner',$Lbanner);
        return $this->fetch();
    }
    // 添加轮播
    public function store()
    {
        return $this->fetch();
    }
    // 修改轮播
    public function edit()
    {
        return $this->fetch();
    }
    // 删除轮播（软删除）
    public function delete()
    {
        $banner = new BannerModel;
        $data = ['status'=>'2'];
        $banner->where('id',input('get.id'))->update($data);
        $this->redirect('admin/banner/index');
    }
    // 删除轮播（直接删除）
    public function cdelete()
    {
        $banner = new BannerModel;
        $banner->where('id',input('get.id'))->delete();
        $this->redirect('admin/banner/index');
    }
    // 停用轮播
    public function stop()
    {
        $banner = new BannerModel;
        $data = ['status'=>'1'];
        $banner->where('id',input('get.id'))->update($data);
        $this->redirect('admin/banner/index');
    }
    // 启用轮播
    public function start()
    {
        $banner = new BannerModel;
        $data = ['status'=>'0'];
        $banner->where('id',input('get.id'))->update($data);
        $this->redirect('admin/banner/index');
    }

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
