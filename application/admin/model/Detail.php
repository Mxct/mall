<?php
namespace app\admin\model;
use think\Model;

class Detail extends Model
{
	public function goods()
	{
		return $this->belongsTo('Goods');
	}
}