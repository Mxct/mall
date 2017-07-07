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