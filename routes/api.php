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


//firmly.zhteng.cn/api/v1/photos?token=1


Route::prefix('v1')->namespace('Api\v1')->group(function () {

	// token
    Route::middleware(['token'])->group(function () {
		Route::get('/photos', 'PhotosController@index')->name('photos');

    });

	Route::get('/login', 'UserController@login')->name('user.login');




    //Route::get('/photos', 'PhotosController@index')->name('photos');
    /*Route::middleware(['auth', 'token'])->group(function () {

        //Route::get('/photos', 'PhotosController@index')->name('photos');
    });

	Route::middleware(['auth:api', 'verified'])->group(function () {
		// Comments
		Route::apiResource('comments', 'CommentController')->only('destroy');
		Route::apiResource('posts.comments', 'PostCommentController')->only('store');

		// Posts
		Route::apiResource('posts', 'TestController')->only(['update', 'store', 'destroy']);
		Route::post('/posts/{post}/likes', 'PostLikeController@store')->name('posts.likes.store');
		Route::delete('/posts/{post}/likes', 'PostLikeController@destroy')->name('posts.likes.destroy');

		// Users
		Route::apiResource('users', 'UserController')->only('update');

		Route::apiResource('member', 'MemberController')->only('update'); // PUT

		// Media
		Route::apiResource('media', 'MediaContrstoreoller')->only(['store', 'destroy']);
	});

	Route::post('/authenticate', 'Auth\AuthenticateController@authenticate')->name('authenticate');
	Route::apiResource('posts.comments', 'PostCommentController')->only('store');
	// Comments
	Route::apiResource('posts.comments', 'PostCommentController')->only('index');
	Route::apiResource('users.comments', 'UserCommentController')->only('index');
	Route::apiResource('comments', 'CommentController')->only(['index', 'show']);

	// Posts
	Route::apiResource('posts', 'TestController')->only(['index', 'show']);
	Route::apiResource('users.posts', 'UserPostController')->only('index');

	// Users
	Route::apiResource('users', 'UserController')->only(['index', 'show']);

	// Media
	Route::apiResource('media', 'MediaController')->only('index');

    //Route::apiResource('photos', 'PhotosController')->only(['index', 'show']);

    Route::apiResource('member', 'MemberController')->only(['index', 'show']);
    Route::apiResource('member', 'MemberController')->only(['store', 'destroy']);
    //Route::apiResource('member/{id}', 'MemberController')->only(['destroy']);
	Route::get('/member/delete/{id}', 'MemberController@delete')->name('member.delete');*/
	//Route::post('/member/update', 'MemberController@update')->name('member.update');

	//Route::apiResource('member', 'MemberController')->only('update'); // PUT


});

