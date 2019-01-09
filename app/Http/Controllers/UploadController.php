<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Qcloud\Cos\Client;
use App\Service\OSS;
use Intervention\Image\ImageManagerStatic as Image;

class UploadController extends Controller
{
	/**
	 * 图片或者头像上传到
	 * 默认上传使用阿里OSS   腾讯OSS 或者 阿里OSS
	 * images-1253193383
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function upload_api(Request $request, $action = '', $oss = 'ali')
	{

		if ($oss == 'ali') {
			try {
				// 获取表单提交的图片
				$pic = $request->file('file');

				// 判断图片有效性
				if (!$pic->isValid()) {
					return back()->withErrors('上传图片无效..');
				}

				//头像处理
				if ($action == 'avatar') {
					$content = Image::make($pic)->resize(200, 200)->encode()->encoded;
				} else {
					$content = file_get_contents($pic);
				}

				// 获取图片在临时文件中的地址
				$content_type = mime_content_type($pic->getRealPath());

				// 制作文件名
				$file_name = !empty($action) ? $action . '/' : '' . time() . rand(10, 99) . '.' . $pic->extension();

				OSS::uploadContent($file_name, $content, ['ContentType' => $content_type]);//设置HTTP头

				// 获取公网图片地址
				$url = OSS::getPublicObjectURL(config('alioss.BucketName'), $file_name);

				return response()->json([
					'message' => '上传成功!',
					'ObjectURL' => $url,
				]);

			} catch (\Exception $e) {

				echo "$e\n";

			}
		}else{
			/*
			 * 腾讯云上传
			 * */
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
}
