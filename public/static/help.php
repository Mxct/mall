<?php

// 等级函数
function grade($a) {
	if($a >=0 && $a <100){
		$b = 100-$a;
		echo 'V1 +'.$b.'UpGrade
';
	} else if($a>=100 && $a < 200 ){
		$b = 200-$a;
		echo 'V2 +'.$b.'UpGrade
';
	} else if($a>=200 && $a < 300 ){
		$b = 300-$a;
		echo 'V3 +'.$b.'UpGrade
';
	} else if($a>=300 && $a < 400 ){
		$b = 400-$a;
		echo 'V4 +'.$b.'UpGrade
';
	} else if($a>=400 && $a < 500 ){
		$b = 500-$a;
		echo 'V5 +'.$b.'UpGrade
';
	} else if($a>=500 && $a < 600 ){
		$b = 600-$a;
		echo 'V6 +'.$b.'UpGrade
';
	} else if($a>=600 && $a <700 ){
		$b = 700-$a;
		echo 'V7 +'.$b.'UpGrade
';
	} else if($a>=700 && $a <800 ){
		$b = 800-$a;
		echo 'V8 +'.$b.'UpGrade
';
	} else if($a>=800 && $a <900 ){
		$b = 900-$a;
		echo 'V9 +'.$b.'UpGrade
';
	} else if($a>=900 && $a <1000 ){
		$b = 1000-$a;
		echo 'V+ +'.$b.'UpGrade
';
	} else if($a>=1000){
		echo 'VIP';
	}
}

// 用户性别转化函数
function sex($a)
{
	$arr = [
			'0' =>'女',
			'1' =>'男',
			];
	return $arr[$a];
}
// 用户状态信息
function userstatus($a)
{
	$arr = [
			'0' =>'正常',
			'1' =>'禁用',
			];
	return $arr[$a];
}
// 收货地址状态识别
function addressStu($a)
{
	$arr = [
			'0' =>'常用',
			'1' =>'默认',
			];
	return $arr[$a];
}

// 用户类型
function userType($a)
{
	$arr = [
			'0' =>'普通用户',
			'1' =>'管理员',
			];
	return $arr[$a];
}

// 订单补0函数
function addzeor($a)
{
	if($a >0 && $a <10){
		return '000'.$a;
	} else if($a >=10 && $a <100) {
		return '00'.$a;
	} else if($a >=100 && $a <1000) {
		return '0'.$a;
	} else {
		return $a;
	}
}

//二维数组去掉重复值
function array_unique_dbl($array2D)
{
	foreach ($array2D as $v){
		$v=join(',',$v); //降维,也可以用implode,将一维数组转换为用逗号连接的字符串
		$temp[]=$v;
	}
	$temp=array_unique($temp); //去掉重复的字符串,也就是重复的一维数组
	foreach ($temp as $k => $v){
		$temp[$k]=explode(',',$v); //再将拆开的数组重新组装
	}
	return $temp;
}

// 商品属性分类
function attrClass($a)
{
	$arr = [
			'1' =>'网络类型',
			'2' =>'颜色',
			'3' =>'内存',
			];
	return $arr[$a];
}
// 生成随机密码
function randMix()
{
	$str1 = join(range('a','z'));
	$str2 = join(range('0','9'));
	$str = str_shuffle($str1.$str2);

	return substr($str,0,6);
}

// 订单状态
function orderstatus($a)
{
	$arr = [
			'0' =>'待审核',
			'1' =>'已下单，待付款',
			'2' =>'已付款，待发货',
			'3' =>'已发货，待收货',
			'4' =>'已收货，待评价',
			'5' =>'已评价',
			];
	return $arr[$a];
}

