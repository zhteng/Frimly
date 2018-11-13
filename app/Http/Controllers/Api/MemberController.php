<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class MemberController extends Controller
{
    //
	public function __construct()
	{

	}

	/**
	 * 绑定手机号
	 * @param  int mobile
	 * @return void
	 */
	public function bindaccount(){

		$member = new Member();
		$one = $member->oneM();
		//var_dump(json_decode($one, true));die;
		return $one;
	}

	/**
	 * 重置密码
	 * @param  int mobile
	 * @param  string code
	 * @param  string password
	 * @return void
	 */
	public function resetpwd(){


	}

	/**
	 * 注册账号
	 * @param  int mobile
	 * @param  string code
	 * @param  string password
	 * @param  string rePassword
	 * @param  int checkbox
	 * @return void
	 */
	public function register(){


	}


	/**
	 * 我的积分
	 * @param  int uid
	 * @return void
	 */
	public function mypoint(){

	}


	/**
	 * 我的收藏
	 * @param  int uid
	 * @return void
	 */
	public function mycollect(){


	}








}
