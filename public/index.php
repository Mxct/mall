<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 加载站点信息常量
include "static/webset.php";
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

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
