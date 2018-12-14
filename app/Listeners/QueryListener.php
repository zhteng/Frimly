<?php
/**
 * SQL 日志监听
 * */

namespace App\Listeners;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Events\QueryExecuted;

class QueryListener
{
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}
	/**
	 * Handle the event.
	 *
	 * @param QueryExecuted $event
	 * @return void
	 */
	public function handle(QueryExecuted $event)
	{
		// 存储文本
		$ip = $_SERVER['REMOTE_ADDR'];
		$arr = explode('?', $_SERVER['REQUEST_URI']);
		$uid = isset($_SERVER['admin_uid']) ? $_SERVER['admin_uid'] : 0;
		$sql = str_replace("?", "'%s'", $event->sql);
		$log = "u$uid" . ' >>> ' . $ip . ' >>> ' . $arr[0] . ' >>> ' . vsprintf($sql, $event->bindings) . ' >>> ' . 'execute-time:' . $event->time;
		Log::info($log);

		// 存储数据库
		# 此处$uid定义是依赖于中间件记录操作日志代码
		/*$uid = isset($_SERVER['admin_uid']) ? $_SERVER['admin_uid'] : 0;
		$OperationLog = new OperationLog();
		$OperationLog->uid = $uid;
		$OperationLog->sql = $log;
		$OperationLog->input = '';
		$OperationLog->save();*/

		if('select' != substr($log , 0 , 6)){
			if('insert into `operationLog`' != substr($log , 0 , 26)){

			}
		}

	}
}
