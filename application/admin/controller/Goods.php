<?php
namespace app\admin\controller;

use think\Controller;	//引入Controller类
use think\Db;
use think\Request;
use app\admin\model\Goods as GoodsModel;
use app\admin\model\Attr;
use app\admin\model\Goodtoattr;
use app\admin\model\Detail;
class Goods extends Controller
{
// 商品管理首页
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
#———————————————————— 华丽分割线 —————————————————————#
// 商品详情
    public function detail()
    {
        return $this->fetch();
    }
// 添加图册介绍
    public function adddetail()
    {
        $id = input('get.id');
        $single = GoodsModel::get($id);
        $this->assign('single',$single);
        return $this->fetch();
    }
// 添加图册介绍处理判断
    public function adddetailcheck()
    {
        for ($i=1; $i <= 4; $i++) {
            $file = request()->file('img' . $i);
            // var_dump($file);
            if(isset($file)){
                $info = request()->file('img' . $i)->move(ROOT_PATH . 'public/uploads/goods');  
                if($info){  
                    $a = $info->getSaveName();
                    $imgp= str_replace("\\","/",$a);  
                    $imgpath = '/uploads/goods/'.$imgp;  
                    $data['img' . $i]= $imgpath; 
                }else{  
                    echo request()->file('img' . $i)->getError();  
                }
            }
        }
        $data['goods_id'] = input('post.goods_id');
        $data['intro'] = input('post.intro');
        $num1 = GoodsModel::get($data['goods_id']);
        // dump($num1);
        $num2 = $num1->detail()->save($data);
        // dump($num1[img1]);
        // $detail = new Detail;
        // $detail->img1 = '123456';
        // $detail->img2 = '123456';
        // // $num1->detail()->save(['img1'=>'12345']);
        // echo $num1->detail->img1;die;
        // dump($num1->detail);die;
        if($num2){  
            $this->success('添加成功','index');  
        }else{
            $this->error('添加失败');
        }
    }
#———————————————————— 华丽分割线 —————————————————————#
// 单商品属性列表
    public function list()
    {
        if(input('get.id')){
            $id = input('get.id');
            $single = GoodsModel::get($id);
            $this->assign('single',$single);
            // 属性详细列表
            
            $GNum = Goodtoattr::where('goods_id',$id)->select();
            $set=[];
            $set1=[];
            foreach ($GNum as $value) {
                $arr1 = $value->toArray();
                array_push($set, $arr1);
                if($arr1['imie'] !== null){
                    array_push($set1, $arr1['imie']);
                }
            }
            $arr2 = array_column($set, 'attr_id');
            // dump($arr2);
            // 每部手机的三个属性组成的2维数组[[1,2,3],[3,5,6]]
            $arr3 = array_chunk($arr2,3);
            // var_dump($arr3);
            // 重新组合数组，每台手机一条数据
            $result=[];
            foreach ($arr3 as $key=>$value) {
                foreach ($set1 as $key1=>$rel) {
                    if($key == $key1){
                        array_push($value,$rel);
                        array_push($result,$value);
                    }
                }
            }
            $this->assign('result',$result);
            // 所有属性
            $attrList = Db::name('attr')->select();
            $this->assign('attrList',$attrList);
            
            return $this->fetch();
        }
    }
// 添加商品属性
    public function addattr()
    {
        if(input('post.')){
            // dump(input('post.'));die;
            $gid = input('post.id');// 商品id
            $netid = input('post.net');//网络类型id
            $colorid = input('post.color');//颜色id
            $memoryid = input('post.memory');//内存id
            $goods = GoodsModel::get($gid);
            // 添加网络类型，
            // 添加商品对应属性，
            $goods->attr()->attach($netid);
            // 找到中间表最新数据
            $id = Goodtoattr::max('id');
            // 更新新数据的mid和附加价格
            Goodtoattr::get($id)->save(['mid'=>'1','money'=>input('post.money1')]);
            // 添加颜色
            $goods->attr()->attach($colorid);
            $id = Goodtoattr::max('id');
            Goodtoattr::get($id)->save(['mid'=>'2','money'=>input('post.money2')]);
            // 添加内存
            $goods->attr()->attach($memoryid);
            $id = Goodtoattr::max('id');
            Goodtoattr::get($id)->save(['mid'=>'3','money'=>input('post.money3')]);
            // 添加库存
            $goods->num = $goods->num+1;
            $goods->save(['num'=>$goods->num]);
            // 生成唯一imie订单号
            $imie = mt_rand(1,9) . addzeor($gid) . addzeor($netid) . addzeor($colorid) . addzeor($memoryid) . addzeor($id);
            // 添加唯一imie
            $result = Goodtoattr::get($id)->save(['imie'=>$imie]);
            if($result){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }

            // $goods = GoodsModel::get(2);
            // dump($user);
            // $add = Address::get(1);
            // $data = [
            //             'person'=>'李新',
            //             'phone'=>'1358877788',
            //             'location'=>'福建泉州',
            //             'first'=>'0',
            //         ];
            // $goods->address()->save($data);
            // $goods->attr()->attach(3);
            // // $goods->address()->detach(6);
            // $attr = Attr::get(3);
            // $result = $attr->mid;echo $result;
            // $id = Goodtoattr::max('id');
            // $a = Goodtoattr::get($id);
            // $a->save(['mid'=>$result]);
            // $a = $attr->goods()->username;这是无法实现的，因为本身对多，没有具体指向的用户名
                    //dump($goods->address);
                   // $arr = $goods->address;//获取所有对应地址信息
                   //  foreach ($arr as $value) {
                   //      dump($value->toArray());
                   //  }
            // $att = $attr->goods;
            // foreach ($att as $value) {
            //     dump($value->toArray());
            // }
        }
        if(input('get.id')){
            $id = input('get.id');
            $single = GoodsModel::get($id);
            $this->assign('single',$single);
            $net = Attr::where('mid','1')->select();
            $color = Attr::where('mid','2')->select();
            $memory = Attr::where('mid','3')->select();
            $this->assign('Anet',$net);
            $this->assign('Acolor',$color);
            $this->assign('Amemory',$memory);
            return $this->fetch();
        }
    }
#———————————————————— 华丽分割线 —————————————————————#
// 添加商品
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
                $imgpath = '/uploads/goods/'.$imgp;  
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
#———————————————————— 华丽分割线 —————————————————————#
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
#———————————————————— 华丽分割线 —————————————————————#
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
// 编辑商品判断处理
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
            $this->success('更新成功','index');  
        }else{
            $this->error('更新失败');
        }
    }

#———————————————————— 华丽分割线 —————————————————————#
// 测试多对多
    public function tomany()
    {
     $a = GoodsModel::get(1);
     $arr = $a->attr;//获取所有对应地址信息
     echo $count=count($arr);
            foreach ($arr as $value) {
                $b=$value->toArray();
                echo $b['attrs'].'<br />';
                echo $b['mid'].'<br />';
            }   
    }
}
