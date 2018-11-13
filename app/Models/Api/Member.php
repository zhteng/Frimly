<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
	protected $connection = 'apimysql';
	protected $table = 'member';
	public function oneM()
	{
		return $this->all();
	}
}
