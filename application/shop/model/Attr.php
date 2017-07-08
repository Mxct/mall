<?php
namespace app\shop\model;
use think\Model;

class Attr extends Model
{
	// 建立和goods表多对多
	public function goods()
	{
		return $this->belongsToMany('Goods','goodtoattr');
	}
}