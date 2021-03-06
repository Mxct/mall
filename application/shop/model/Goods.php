<?php
namespace app\shop\model;
use think\Model;

class Goods extends Model
{
	// 自动写入时间戳
	protected $autoWriteTimestamp = true;

	// 建立和attr表多对多
	public function attr()
	{
		return $this->belongsToMany('Attr','goodtoattr');
	}

	// 建立和detail表一对一
	public function detail()
	{
		return $this->hasOne('Detail');
	}
}