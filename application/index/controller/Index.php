<?php
namespace app\index\controller;

use think\Request;
use think\Controller;

//通常控制器都需要继承自think\Controller
class Index extends Controller
{
    public function index()
    {
        //$this->assign('content','分配的内容');
        return $this->fetch('',['content'=>'xxx']);
        //return view('',['content'=>'xxx'],['__PUBLIC__'=>'public']);
        //return $this->fetch('',['content'=>'xxx'],['__PUBLIC__'=>'public']);
    }
    public function demo()
    {
    	return __METHOD__;
    }
    //方式1：传统方式，静态方法创建单例对象
    public function request1()
    {   	
    	$request = Request::instance();
    	return $request->url(true);

    }
   	//方式2：继承自think\Controller
   	public function request2()
    {
    	return $this->request->url(true);
    }
    //方式3：依赖注入
    public function request3(Request $request)
    {
    	return $request->url(true);
    }
    //方式4：助手函数
    public function request4()
    {
    	return request()->url(true);
    }
    public function url()
    {
    	$request = Request::instance();
		// 获取当前域名
		echo 'domain: ' . $request->domain() . '<br/>';
		// 获取当前入口文件
		echo 'file: ' . $request->baseFile() . '<br/>';
		// 获取当前URL地址 不含域名
		echo 'url: ' . $request->url() . '<br/>';
		// 获取包含域名的完整URL地址
		echo 'url with domain: ' . $request->url(true) . '<br/>';
		// 获取当前URL地址 不含QUERY_STRING
		echo 'url without query: ' . $request->baseUrl() . '<br/>';
		// 获取URL访问的ROOT地址
		echo 'root:' . $request->root() . '<br/>';
		// 获取URL访问的ROOT地址
		echo 'root with domain: ' . $request->root(true) . '<br/>';
		// 获取URL地址中的PATH_INFO信息
		echo 'pathinfo: ' . $request->pathinfo() . '<br/>';
		// 获取URL地址中的PATH_INFO信息 不含后缀
		echo 'pathinfo: ' . $request->path() . '<br/>';
		// 获取URL地址中的后缀信息
		echo 'ext: ' . $request->ext() . '<br/>';
    }
    //获取模块控制器方法信息
    public function mca()
    {
    	$request = Request::instance();
		echo "当前模块名称是" . $request->module() . '<br />';
		echo "当前控制器名称是" . $request->controller() . '<br />';
		echo "当前操作名称是" . $request->action() . '<br />';
    }
    //获取请求参数
    public function argu()
    {
    	$request = Request::instance();
		echo '请求方法：' . $request->method() . '<br/>';
		echo '资源类型：' . $request->type() . '<br/>';
		echo '访问地址：' . $request->ip() . '<br/>';
		echo '是否AJax请求：' . var_export($request->isAjax(), true) . '<br/>';
		echo '请求参数：';
		dump($request->param());
		echo '请求参数：仅包含name';
		dump($request->only(['name']));
		echo '请求参数：排除name';
		dump($request->except(['name']));
    }
    //获取变量
    public function var()
    {
    	// 获取当前请求的name变量
		dump(Request::instance()->param('name'));
		// 获取当前请求的所有变量（ 经过过滤）
		dump(Request::instance()->param());
		// 获取当前请求的所有变量（ 原始数据）
		dump(Request::instance()->param(false));
		// 获取当前请求的所有变量（ 包含上传文件）
		dump(Request::instance()->param(true));
    }
    //变量过滤
    public function filter()
    {
    	//使用过滤函数
    	//Request::instance()->filter('strtoupper');
    	//dump(Request::instance()->param(false));
    	//dump(Request::instance()->param());
    	dump(Request::instance()->get('name','xxx','strtoupper'));
    }
    //请求头信息
    public function header()
    {
    	//获取所有
    	//dump(Request::instance()->header());
    	//获取指定
    	dump(Request::instance()->header('user-agent'));
		dump(Request::instance()->header('User-Agent'));
		dump(Request::instance()->header('USER_AGENT'));
    }
    public function args($name='xxx',$id=123)
    {
    	dump('name:'.$name);
    	dump('id:'.$id);
    }
}
