<?php

namespace app\index\model;

use think\Model;

class Role extends Model
{
	public function user()
	{
		return $this->belongsToMany('User','access');
	}
}