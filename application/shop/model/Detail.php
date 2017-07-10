<?php
namespace app\shop\model;
use think\Model;

class Detail extends Model
{
	public function goods()
	{
		return $this->belongsTo('Goods');
	}
}