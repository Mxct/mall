<?php
namespace app\admin\model;
use think\Model;

class Goods extends Model
{
	// 自动写入时间戳
	protected $autoWriteTimestamp = true;
	// 获取器
	public function getStatusAttr($status)
	{
		$arr = [
					0 	=>	'下架',
					1	=>	'上架',
				];
		return $arr[$status];
	}
	// 建立和attr表多对多
	public function attr()
	{
		return $this->belongsToMany('Attr','goodtoattr');
	}
}