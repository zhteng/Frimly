<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

/*class Member extends Model
{
	protected $connection = 'apimysql';
	protected $table = 'member';
	public function oneM()
	{


		$result = parent::storeData($data, $flash);
		return $this->all();
	}
}*/


class Member extends Model{

	protected $table = 'member'; // 默认 flights
	protected $primaryKey = 'uid'; // 默认 id
	public $incrementing = true; // 当你的主键不是自增或不是int类型
	public $timestamps = false; // 不自动维护created_at 和 updated_at 字段
	protected $dateFormat = 'U'; // 自定义自己的时间戳格式

    protected $fillable = [
        'uid',
        'nickname',
        'sex',
        'birthday',
        'reg_ip',
        'score',
        'status',
        'reg_time',

    ];


	const CREATED_AT = 'reg_time'; // 自定义用于存储时间戳的字段名
	const UPDATED_AT = 'update_time'; // 同上

    public static function boot()
    {
        parent::boot();
    }



    public function destroyData($data, $flsh=true){
		return $this->insertGetId($data);

	}



}



