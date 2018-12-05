<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{

	private $_key = '';

	public function __construct(Request $request)
	{
		if (!empty($request->input('uid'))){
			$this->_key = 'udata.' . $request->input('uid');
		}
	}


	/**
     * Return the users.
     */
    public function index(Request $request): ResourceCollection
    {
        return UserResource::collection(
            User::withCount(['comments', 'posts'])->with('roles')->latest()->paginate($request->input('limit', 20))
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
			return User::find($request->input('uid'));
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
	 * @param Request $request
	 */
    public function login(Request $request)
	{
		$uid = $request->input('uid');
		$password = $request->input('password');
		if (!empty($uid) && !empty($password)){
			if ($this->_key != ''){
				if (!empty(Redis::get($this->_key))){
					return Redis::get($this->_key);
				}
				$user = User::find($request->input('uid'));
				if (!empty($user)){
					Redis::set($this->_key, $user);
					return $user;
				}
			}
		}
		return response()->json(['message' => 'This user information is error.'], 401);
	}

}
