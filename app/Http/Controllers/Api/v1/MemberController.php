<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post;
use App\Models\Api\Member;
use Illuminate\Http\Request;
//use App\Http\Resources\Member as MemberResource;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;

class MemberController extends Controller
{
	private $_key = 'member.udata.';

	public function __construct(Request $request)
	{
		if (!empty($request->input('uid'))){
			$this->_key = $this->_key . $request->input('uid');
		}
	}


	/**
	 * Return the member.
	 */
	public function index(Request $request): ResourceCollection
	{
		return UserResource::collection(
			Member::withCount(['comments', 'posts'])->with('roles')->latest()->paginate($request->input('limit', 20))
		);
	}

	/**
	 * Return the specified resource.
	 */
	public function show(Request $request)
	{
		if ($this->_key != '')
		{
			return $data = Redis::get($this->_key);
		}else{
			return Member::find($request->input('uid'));
		}
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UsersRequest $request, User $user): UserResource
	{
		$this->authorize('update', $user);

		if ($request->filled('password')) {
			$request->merge([
				'password' => Hash::make($request->input('password'))
			]);
		}

		$user->update(array_filter($request->only(['name', 'email', 'password'])));

		return new UserResource($user);
	}

	/**
	 * return login token resource
	 * @params Request $request
	 * http://firmly.zhteng.cn/api/v1/login?username=哈哈&password=123456
	 */
	public function login(Request $request, Member $member)
	{

		$data = Member::where('uid', 1)
			//->select('member.*', 'ucenter_member.*')
			->leftJoin('ucenter_member', 'member.uid', '=', 'ucenter_member.id')
			//->with(['labels'])
			->get(array('uid', 'member.reg_time as aaa'))->toArray();

var_dump($data);die;

		//$da = $member->ucenter();
		$da = Member::find(1)->hasOneUcentermember()->get()->toArray();
		var_dump($da);die;

		$uid = $request->input('username');
		$password = $request->input('password');
		if (!empty($uid) && !empty($password)){
			if ($this->_key != ''){
				if (!empty(Redis::get($this->_key))){
					return response()->json(['code' => 200,'message' => 'success','data' => Redis::get($this->_key)]);
				}
				$member = Member::find($request->input('uid'));
				if (!empty($member)){
					Redis::setex($this->_key, 300, $member);
					//Redis::set($this->_key, $member);
					return response()->json(['code' => 200,'message' => 'success','data' => $member]);
				}
			}
		}
		return response()->json(['message' => 'This user information is error.'], 401);
	}


    public function store(Request $request):MemberResource
    {
        return new MemberResource(Member::create($request->all()));
    }

	public function destroy(Post $post): Response
	{
		$this->authorize('delete', $post);

		$post->delete();

		return response()->noContent();
	}

	public function delete(Request $request, $id)
	{
		$member = Member::findOrFail($id);
		$member->delete();
		return 204;
	}


	/*public function update(Request $request): MemberResource
	{
		$member = Member::findOrFail($request['uid']);
		$member->update($request->all());
		return new MemberResource($member);
	}*/


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
