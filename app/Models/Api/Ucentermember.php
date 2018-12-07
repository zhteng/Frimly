<?php
/**
 * Created by IntelliJ IDEA.
 * User: ray
 * Date: 12/6/18
 * Time: 16:43
 */

namespace App\Models\Api;

//use Guzzle\Service\Resource\Model;
use Illuminate\Database\Eloquent\Model;

class Ucentermember extends Model
{
	protected $table = 'ucenter_member'; // 默认 flights
	protected $primaryKey = 'id';
	public $timestamps = false; // 不自动维护created_at 和 updated_at 字段

	protected $fillable = ['id', 'username', 'password', 'email', 'reg_ip', 'status', '', '',];

	const CREATED_AT = 'reg_time'; // 自定义用于存储时间戳的字段名
	const UPDATED_AT = 'update_time'; // 同上

	public static function boot()
	{
		parent::boot();
	}



}