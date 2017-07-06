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
        // $Lbanner = BannerModel::select();
        // $this->assign('banner',$Lbanner);
        $list= BannerModel::where('')->paginate('2');
        $this->assign('list',$list);
        return $this->fetch();
    }

    // 添加轮播
    public function store()
    {
        return $this->fetch();
    }
    // 添加轮播判断
    public function addg()
    {
        $file = request()->file('src');  
        $data = input('post.');  
        if(isset($file)){  
            // 获取表单上传文件 例如上传了001.jpg  
            // 移动到框架应用根目录/public/uploads/ 目录下  
            $info = $file->move(ROOT_PATH . 'public/uploads/banner');  
            // var_dump($info) ;die;  
            if($info){  
                // 成功上传后 获取上传信息  
                $a = $info->getSaveName();  
                $imgp= str_replace("\\","/",$a);  
                $imgpath='/uploads/banner/'.$imgp;  
                $data['src']= $imgpath; 
            }else{  
                // 上传失败获取错误信息  
                echo $file->getError();  
            }
        }else{
            unset($data['src']);
        }
        $num = BannerModel::insert($data);  
        if($num){  
            $this->success('添加成功');  
        }else{
            $this->error('添加失败');
        }
    }

    // 修改轮播
    public function edit()
    {
        if(input('get.id')){
            $id = input('get.id');
            $baninfo = BannerModel::where('id',$id)->find();
            $this->assign('baninfo',$baninfo);
            return $this->fetch();
        }else{
            echo "找不到";
        }
    }
    // 修改轮播
    public function update()
    {
        $file = request()->file('src');  
        $data = input('post.');  
        if(isset($file)){  
            // 获取表单上传文件 例如上传了001.jpg  
            // 移动到框架应用根目录/public/uploads/ 目录下  
            $info = $file->move(ROOT_PATH . 'public/uploads/banner');  
            // var_dump($info) ;die;  
            if($info){  
                // 成功上传后 获取上传信息  
                $a = $info->getSaveName();  
                $imgp= str_replace("\\","/",$a);  
                $imgpath='/uploads/banner/'.$imgp;  
                $data['src']= $imgpath; 
            }else{  
                // 上传失败获取错误信息  
                echo $file->getError();  
            }
        }else{
            unset($data['src']);
        }
        $num = BannerModel::update($data);  
        if($num){  
            $this->success('更新成功');  
        }else{
            $this->error('更新失败');
        }
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

// 文件上传格式
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
