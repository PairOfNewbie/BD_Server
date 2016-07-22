<?php
require_once  __DIR__ .'/../../../vendor/autoload.php';
header('Access-Control-Allow-Origin:*');
use Qiniu\Auth;
$bucket = 'testspace';
$accessKey = 'f_wZynSN_kMQXWGVt500lghn8xCH2O7FGcwaXxGS';
$secretKey = 'xRC9uIuvvOYrHQjxx-xec6W8-V0GWWHVeZg6W_Up';
$auth = new Auth($accessKey, $secretKey);
//$upToken = $auth->uploadToken($bucket);
$policy = array(
'returnUrl' => 'http://127.0.0.1/demo/simpleuploader/fileinfo.php',
    'returnUrl' => 'http://www.dev4love.com/Beautiful_Day/admin/fileinfo.php',
    'returnBody' => '{"fname": $(fname)}',
);
$upToken = $auth->uploadToken($bucket, null, 3600, $policy);
echo $upToken;
