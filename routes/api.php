<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::get('member/get', '\App\Http\Controllers\Api\MemberController@get');

Route::group(['namespace' => 'Api', 'prefix' => 'api'], function() {

	Route::get('member/get', '\App\Http\Controllers\Api\MemberController@get');
	Route::get('list/detail', "ListController@index");

	// 绑定手机号
	Route::get('member/bindaccount', 'MemberController@bindaccount');

	// 修改密码 params
	Route::get('/api/resetpwd', '\App\Http\Controllers\Api\c@resetpwd');

	// 注册 params {mobile, code, pwd, pwd}
	Route::get('/api/register', '\App\Http\Controllers\Api\UserController@register');


});

