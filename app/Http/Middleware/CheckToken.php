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

class CheckToken
{
	public function handle($request, Closure $next)
	{
		if ($request->input('token') != '12580')
		{
			return redirect()->to('');
		}
		return $next($request);
	}
}