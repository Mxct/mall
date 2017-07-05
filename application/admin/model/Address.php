<?php
namespace app\admin\model;
use think\Model;
use traits\model\SoftDelete;  //软删除类

class Address extends Model
{

	// 建立和user表的多对多关系
	public function user()
	{
		return $this->belongsToMany('User','usertoadd');
	}
}