<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Qcloud\Cos\Client;
use App\Services\OSS;

class UploadController extends Controller
{
	/**
	 * 默认上传，使用腾讯云静态存储
	 * images-1253193383
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function upload_api(Request $request)
	{
		// 获取表单提交的图片
		$pic = $request->file('pic');

		// 判断图片有效性
		if (!$pic->isValid()) {
			return back()->withErrors('上传图片无效..');
		}

		// 获取图片在临时文件中的地址
		$pic = $pic->getRealPath();

		// 制作文件名
		$key = time() . rand(10000, 99999999) . '.jpg';

		//阿里 OSS 图片上传
		$result = OSS::upload($key, $pic);
		var_dump($result);die;
		if ($result) {
			// success
		} else {
			// fail
		}

		$cosClient = new Client(array('region' => env('COS_REGION'),
			'credentials'=> array(
				'appId' => env('COS_APPID'),
				'secretId' => env('COS_KEY'),
				'secretKey' => env('COS_SECRET'))));

		try {
			$result = $cosClient->putObject(array(
				'Bucket' => 'images-20190107',
				'Key' => md5_file($request->file).'.'.$request->file->extension(),
				'Body' => file_get_contents($request->file),
				'ServerSideEncryption' => 'AES256'));
			return response()->json([
				'message' => '上传成功!',
				'ObjectURL' => $result['ObjectURL']
			]);
		} catch (\Exception $e) {
			echo "$e\n";
		}
	}
}
