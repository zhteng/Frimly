<?php
/**
 * User: Zteng
 * Date: 12/8/18
 * 操作日志
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
	protected $table = 'obs_usuarios';
	protected $fillable = [
		'observaciones',
		'usuario_id',
		'autor_id',
		'tipo',
	];

}