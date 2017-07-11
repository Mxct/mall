<?php
namespace app\shop\controller;

use think\Db;
use think\Controller;	//引入Controller类
use think\Cookie;      //Cookie类
use app\shop\model\Goods;//Goods
use app\shop\model\Goodtoattr;//Goodtoattr
use app\shop\model\Attr;//Attr
use app\shop\model\Detail;//Attr
class Detail extends Controller
{
	// 商品详情
    public function index()
    {
    	if(input('get.id')){
    		$id = input('param.id');
    		$Ginfo = Goods::get($id);
    		$this->assign('Ginfo',$Ginfo);
            // 属性详细列表
            $good = Goods::get($id);
            $goodattrs = $good->attr;//获取所有对应属性,需要去除已经出库的
            // 总库存
            $count = count($goodattrs)/3;

            // 所有单品数组([1,4,9])
            $mark=[1,4,9];
            $mark1 = [];
             foreach ($goodattrs as $value) {
                $goodattr=$value->toArray();
                // 将mid和attr_id压入mark1数组中
                array_push($mark1, $goodattr['pivot']['attr_id']);
            }
            // dump($mark1);
            $mark2 = array_chunk($mark1,3);
            // dump($mark2);
            // 匹配库存数量
            $a=0;
            foreach ($mark2 as $value) {
                if($mark == $value) {
                    $a++;
                }
            }
            //var_dump($a);//库存数量


            // attrs--mid
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
            // 去除二维数组中的重复一维数组(mid,attrs)
            $goodattr1 = array_unique_dbl($set2);

            $new1=[];
            // 将商品所有mid推到一个数组
            foreach ($goodattr1 as $value) {
                array_push($new1,$value[0]);
            }
            // 删除mid数组中重复的元素
            $new2 = array_unique($new1);
            // var_dump($new2);

            // 获取数组(attrs,money)
            $temp1=[];
            $temp2=[];
           foreach ($goodattrs as $val) {
                $goodattr=$val->toArray();
                // 将mid和attr_id压入set1数组中
                array_push($temp1, $goodattr['pivot']['attr_id']);
                array_push($temp1, $goodattr['pivot']['money']);
                if(count($temp1)>2){
                    array_shift($temp1);
                    array_shift($temp1);
                }
                array_push($temp2,$temp1);
            }
            // var_dump($temp2);
            // 去除二维数组中的重复一维数组(attr_id,money)
            $goodattr2 = array_unique_dbl($temp2);
            // 展示
            // 1:...
            // 2:...
            // 3:...
            foreach ($new2 as $value) {
                echo $value.":";//输出mid
                foreach ($goodattr1 as $rel) {
                   if($value == $rel[0]){
                        echo $rel[1];//输出属性attr_id
                        foreach ($goodattr2 as $val) {
                            if($val[0] == $rel[1]) {
                                echo '('.$val[1].'),';
                            }
                        }
                   }
                }
                echo '<br />';
            }

            $this->assign('count',$count);//gid
            $this->assign('gid',$id);//gid
            $this->assign('attrsN',$new2);//mid
            $this->assign('attrsV',$goodattr1);//attr_id
            $this->assign('mon',$goodattr2);//money
            // 所有属性
            $attrList = Db::name('attr')->select();
            $this->assign('attrList',$attrList);
            // 图册和详情
            $imgslist = Detail::get(['goods_id'=>$id]);
            $this->assign('imgslist',$imgslist);
    		return $this->fetch();
    	}else{
    		$this->error('非法操作');
    	}
    }


    // 返回判断库存数量
    public function storeAj()
    {
        $id = $_GET['gid'];
        // 属性详细列表
        $good = Goods::get($id);
        $goodattrs = $good->attr;//获取所有对应属性

        unset($_GET['gid']);
        $mark=$_GET;
            $mark1 = [];
             foreach ($goodattrs as $value) {
                $goodattr=$value->toArray();
                // 将mid和attr_id压入mark1数组中
                array_push($mark1, $goodattr['pivot']['attr_id']);
            }
            $mark2 = array_chunk($mark1,3);
            // 匹配库存数量
            $a=0;
            foreach ($mark2 as $value) {
                if($mark == $value) {
                    $a++;
                }
            }
            echo $a;//库存数量
    }
    // 判断提交订单数据拿到数据组合
    public function buy()
    {
        var_dump($_GET);
    }
    // 测试删除库存
    public function reduce()
    {
    	$sale=[1,4,9];//客户购买的属性组合
    	$num = 2;     //客户购买的数量
    	$id = 1;      //客户购买的产品type
    	$good = Goods::get($id);
        $goodattrs = $good->attr;
        // dump($goodattrs);
        // attrs--mid
        $attrs=[];
        $id = [];

       // 遍历除所有的key,标志位
       $store = new Goodtoattr;
       $all = $store->where('goods_id','1')->select();
       foreach ($all as $value) {
       		$each = $value->toArray();
       		array_push($attrs, $each['attr_id']);
       		array_push($id, $each['id']);
       }
       // dump($attrs);
       // dump($id);
       $set = array_combine($id, $attrs);
        // dump($set);
        // 切片3个一个单位
        $mark = array_chunk($set,3,true);//保留key
        // dump($mark);
        $savekey = [];
        foreach ($mark as $value) {
        	$mark1=array_values($value);
        	$mark2 = array_keys($value);
        	if($sale == $mark1){
        		//提取相同属性的商品的键值
        		array_push($savekey,$mark2);
        	}
        }
        // dump($savekey);
        // 按照销售的数量去删除数据条数num,得到所有需要删除的键
        $reduce = array_slice($savekey,0,$num);
        // dump($reduce);
        // 转化为一维数组
        $delkey = [];
        foreach ($reduce as $value) {
        	foreach ($value as $rel) {
        		array_push($delkey,$rel);
        	}
        }

        // 一条条进行删除foreach执行删除
        foreach ($delkey as $value) {
        	Db::name('goodtoattr')->where('id',$value)->delete();
        }
        echo 'ok';
    }
}
