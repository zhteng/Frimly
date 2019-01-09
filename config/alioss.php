<?php
/**
 * @Author Zteng.
 * @Description TODO
 * @Time: 2019/1/7 17:31
 * @Version V1.0
 */

return [
	/*
	 * 经典网络 or VPC
	 * */
	'networkType' => env('OSS_NET_WORK_TYPE','经典网络'),

	/*
	 * 城市名称：
	 * 经典网络下可选：杭州、上海、青岛、北京、张家口、深圳、香港、硅谷、弗吉尼亚、新加坡、悉尼、日本、法兰克福、迪拜
	 * VPC 网络下可选：杭州、上海、青岛、北京、张家口、深圳、硅谷、弗吉尼亚、新加坡、悉尼、日本、法兰克福、迪拜
	 * */
	'city' => env('OSS_CITY','北京'),

	'ossServer' => env('ALIOSS_SERVER', null),                      // 外网
	'ossServerInternal' => env('ALIOSS_SERVERINTERNAL', null),      // 内网
	'AccessKeyId' => env('ALIOSS_KEYID', null),                     // key
	'AccessKeySecret' => env('ALIOSS_KEYSECRET', null),             // secret
	'BucketName' => env('ALIOSS_BUCKETNAME', null),                 // bucket
	'ossDomain' => env('OSS_DOMAIN'),										// OSS绑定域名
];

