<?php

namespace app\index\model;
use think\Model;
use traits\model\SoftDelete;

class User extends Model
{
	use SoftDelete;
	//指定对应的完整表名(不对应时才需要指定)
	//protected $table = 'think_user';
	//指定对应的表名，不带前缀
	//protected $name = 'user';
	
	//同时写入创建和更新时间
	protected $autoWriteTimestamp = true;
	//protected $createTime = 'ctime';
	//protected $updateTime = false;

	//获取器
	public function getStatusAttr($status)
	{
		$arr = [
					0 	=>	'购物车',
					1	=>	'已下单，待支付',
					2	=>	'已支付，待发货',
					3	=>	'已发货，待签收'
				];
		return $arr[$status];
	}
	//定义一对一关联方法
	public function profile()
	{
		return $this->hasOne('Profile');
	}
	//多对多关联方法
	public function role()
	{
		return $this->belongsToMany('Role','access');
	}
}