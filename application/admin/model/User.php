<?php
namespace app\admin\model;
use think\Model;
use traits\model\SoftDelete;  //软删除类

class User extends Model
{
	// 自动写入时间戳
	protected $autoWriteTimestamp = true;
	// 使用软删除
	use SoftDelete;
	// 建立和address表的多对多关系
	public function address()
	{
		return $this->belongsToMany('Address','usertoadd');
	}
}