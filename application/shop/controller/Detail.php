<?php
namespace app\shop\controller;

use think\Db;
use think\Controller;	//引入Controller类
use think\Cookie;      //Cookie类
use app\shop\model\Goods;//Goods
use app\shop\model\Goodtoattr;//Goodtoattr
use app\shop\model\Attr;//Attr
class Detail extends Controller
{
	// 商品详情
    public function index()
    {
    	if(input('get.id')){
    		$id = input('get.id');
    		$Ginfo = Goods::get($id);
    		$this->assign('Ginfo',$Ginfo);
            // 属性详细列表
            $good = Goods::get($id);
            $goodattrs = $good->attr;//获取所有对应属性
            $set1=[];
            $set2=[];
            foreach ($goodattrs as $value) {
                $goodattr=$value->toArray();
                // 将mid和attr_id压入set1数组中
                array_push($set1, $goodattr['pivot']['mid']);
                array_push($set1, $goodattr['pivot']['attr_id']);
                if(count($set1)>2){
                    array_shift($set1);
                    array_shift($set1); 
                }
                array_push($set2,$set1); 
            }
            // 去除二维数组中的重复一维数组
            $goodattr = array_unique_dbl($set2);
            // 1:...
            // 2:...
            // 3:...
            $new1=[];
            // 将商品所有mid推到一个数组
            foreach ($goodattr as $value) {
                array_push($new1,$value[0]);
            }
            // 删除mid数组中重复的元素
            $new2 = array_unique($new1);
            // var_dump($new2);
            // foreach ($new2 as $value) {
            //     echo $value.":";
            //     foreach ($goodattr as $rel) {
            //        if($value == $rel[0]){
            //             echo $rel[1];  $attr->attrs;
            //        }
            //     }
            //     echo '<br />';
            // }
            $this->assign('attrsN',$new2);
            $this->assign('attrsV',$goodattr);
            // 所有属性
            $attrList = Db::name('attr')->select();
            $this->assign('attrList',$attrList);
    		return $this->fetch();
    	}else{
    		$this->error('非法操作');
    	}
    }
}
