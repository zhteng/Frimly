<?php
/**
 * Created by IntelliJ IDEA.
 * User: ray
 * Date: 12/4/18
 * Time: 18:16
 */
//https://laravelacademy.org/post/7812.html

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;

class CheckToken
{
	public function handle($request, Closure $next)
	{
		$token = Redis::get('token');

		if (empty($token) || $token != $request->input('token'))
		{
			return response()->view('/include/error');
		}
		return $next($request);
	}
}