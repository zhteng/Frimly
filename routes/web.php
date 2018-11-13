<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::post('/articles/search', 'ArticleController@search')->name('articles.search');
Route::get('/articles/list', 'ArticleController@list')->name('articles.list');
Route::resource('/articles', 'ArticleController');
Route::resource('/comments', 'CommentController');
Route::resource('/tags', 'TagController');

Route::get('/task/home', 'TaskController@home');

// 中间件
Route::middleware(['auth', 'super'])->prefix('z')->group(function () {
	Route::get('/dashboard', 'AdminController@dashboard_api');
	Route::get('/articles', 'ArticleController@index_api');
	Route::post('/articles', 'ArticleController@store_api');
	Route::post('/articles/update', 'ArticleController@update_api');
	Route::get('/articles/publish/{id}', 'ArticleController@publish_api');
	Route::get('/articles/top/{id}', 'ArticleController@top_api');
	Route::get('/articles/delete/{id}', 'ArticleController@destroy_api');
	Route::post('/articles/markdown', 'ArticleController@markdown_api');
	Route::get('/articles/{id}', 'ArticleController@show_api');
	Route::get('/comments', 'CommentController@index_api');
	Route::get('/comments/delete/{id}', 'CommentController@destroy_api');
	Route::get('/visits', 'VisitController@index_api');
	Route::post('/upload', 'UploadController@upload_api');
	Route::get('/tags', 'TagController@index_api');
	Route::get('/tags/delete/{id}', 'TagController@destroy_api');

	Route::get('/settings', 'SettingController@index_api');
	Route::post('/settings', 'SettingControllerLogin@store_api');

	Route::get('/users/{id}', 'MemberController@show_api');
	Route::post('/users/{id}', 'MemberController@update_api');
});


/*前台路由*/
/*Route::group(array(['namespace' => 'Home'],'prefix'=>'home'),function(){
	//列表页
	Route::any('/list/{post}', "\App\Http\Controllers\Api\ListController@index");

	//详情页
	Route::any('/detail/{post}', "\App\Http\Controllers\Home\DetailController@index");

	//留言板
	//显示界面
	Route::any('/message', "\App\Http\Controllers\Home\MessageController@index");

	//提交逻辑
	Route::any('/message/submit', "\App\Http\Controllers\Home\MessageController@submit");

	//搜索
	Route::any('/search', "\App\Http\Controllers\Home\SearchController@index");

});*/

/*Route::namespace('Api')->group(function ($post){

	Route::any('/api/list/{post}', "\App\Http\Controllers\Api\ListController@index");

});*/

/*
|--------------------------------------------------------------------------
| API
|--------------------------------------------------------------------------
|
| Api Controller 在 App\Http\Controller\Api 这个命名空间下。
|
*/
Route::group(['namespace' => 'Api', 'prefix' => 'api'], function(){

	Route::get('list/detail', "ListController@index");

	// 绑定手机号
	Route::get('member/bindaccount', 'MemberController@bindaccount');

	// 修改密码 params
	Route::get('/api/resetpwd', '\App\Http\Controllers\Api\c@resetpwd');

	// 注册 params {mobile, code, pwd, pwd}
	Route::get('/api/register', '\App\Http\Controllers\Api\UserController@register');


});



/*Route::group(array(['namespace' => 'Api'], 'prefix'=>'api'),function(){
	//列表页
	Route::any('/list/{post}', "\App\Http\Controllers\Api\ListController@index");

	//详情页
	Route::any('/detail/{post}', "\App\Http\Controllers\Home\DetailController@index");

	//留言板
	//显示界面
	Route::any('/message', "\App\Http\Controllers\Home\MessageController@index");

	//提交逻辑
	Route::any('/message/submit', "\App\Http\Controllers\Home\MessageController@submit");

	//搜索
	Route::any('/search', "\App\Http\Controllers\Home\SearchController@index");

});*/


Route::get('name/{name}/age/{age}', function($name, $age){
	return'I`m '.$name.' ,and I`m '.$age;
});




