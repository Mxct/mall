<?php
namespace app\admin\controller;

use think\Controller;	//引入Controller类
use think\Db;
use app\admin\model\User;

class Webset extends Controller
{
	//修改网站设置
    public function index()
    {
        $database = 'static/webset.php' ;
        //读取配置文件
        $content = file_get_contents($database) ;

        //进行正则替换，更改数据库配置文件

        foreach ($_POST as $key => $value) {
            $reg = "/define\('$key',\s*'.*?'\);/ ";
            $replacement = "define('$key','$value');" ;
            $content = preg_replace($reg, $replacement, $content) ;
        }
        file_put_contents($database, $content);
        return $this->fetch();
    }

}
