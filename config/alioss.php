<?php
/**
 * @Author Zteng.
 * @Description TODO
 * @Time: 2019/1/7 17:31
 * @Version V1.0
 */

return [
	'ossServer' => env('ALIOSS_SERVER', null),                      // 外网
	'ossServerInternal' => env('ALIOSS_SERVERINTERNAL', null),      // 内网
	'AccessKeyId' => env('ALIOSS_KEYID', null),                     // key
	'AccessKeySecret' => env('ALIOSS_KEYSECRET', null),             // secret
	'BucketName' => env('ALIOSS_BUCKETNAME', null)                  // bucket
];

