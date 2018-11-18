<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post;
use App\Models\Api\Member as Member;
use Illuminate\Http\Request;
use App\Http\Resources\Member as MemberResource;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class MemberController extends Controller
{
    //
	public function __construct()
	{

	}

	public function index(){

    }

    public function show(Member $member): MemberResource
    {
        return new MemberResource($member);
    }


    public function store(Request $request):MemberResource
    {
        return new MemberResource(Member::create($request->all()));
    }

    public function destroy(Member $member){

        $member->delete();

        return response()->noContent();
    }


    public function get(Request $request){
	    //var_dump($request);die;
		if ($request->isMethod('get')){
			$uid = Input::get('uid');
			if (empty($uid)){

			}
			$flights = Member::where('uid', 2)
				->orderBy('uid', 'desc')
				->take(10)
				->get();

			return response()->json(['ret'=>1,'msg'=>'success','data'=>$flights]);

		}


		//return $flights;
	}


	/**
	 * 绑定手机号
	 * @param  int mobile
	 * @return void
	 */
	public function bindaccount(Request $request){
		if ($request->isMethod('get')){
			$data = Input::get();

			Member::where('uid', 2)->update(['nickname' => '哈哈']);

		}


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
	 * 我的收藏
	 * @param  int uid
	 * @return void
	 */
	public function mycollect(){


	}








}
