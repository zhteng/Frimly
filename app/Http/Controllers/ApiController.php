<?php

namespace App\Http\Controllers;


class ApiController extends Controller
{
	private $Code = 200;  // 默认返回码

	public function __construct($Code)
	{
		$this->Code = $Code;
	}

	/**
	 * 获取返回码
	 * @return [int] [description]
	 */
	public function getCode()
	{
		return $this->Code;
	}

	/**
	 * 设置返回码,连贯操作
	 * @param [object] $Code [description]
	 */
	public function setCode($Code)
	{
		$this->Code = $Code;
		return $this;
	}

	/**
	 * 基本的响应方法
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function response($data)
	{
		return response()->json($data);
	}

	/**
	 * 错误响应
	 * @param  string $message [description]
	 * @return [type]          [description]
	 */
	public function responseErrors($message = 'Not Found')
	{
		return $this->response([
			'status'      => 'failed',
			'status_code' => $this->getCode(),
			'massage'     => $message
		]);
	}

	/**
	 * 请求数据的成功响应
	 * @param  string $message [description]
	 * @return [type]          [description]
	 */
	public function responseSuccess($data, $message = 'Success')
	{
		return $this->response([
			'status'      => 'success',
			'status_code' => $this->getCode(),
			'massage'     => $message,
			'data'        => $data
		]);
	}

	/**
	 * 不带数据的状态成功响应
	 * @param  {String} $message [description]
	 * @return {[type]}          [description]
	 */
	public function responseOk($message ='Ok')
	{
		return $this->response([
			'status'      => 'success',
			'status_code' => $this->getCode(),
			'massage'     => $message
		]);
	}

}