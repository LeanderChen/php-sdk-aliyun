<?php
// 禁止远程调用
$_SERVER['SERVER_ADDR'] === '127.0.0.1' OR exit('No Remote Calls!');

// 显示错误提示
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_STRICT);
function_exists('ini_set') && ini_set('display_errors', TRUE);
date_default_timezone_set('UTC');

// 基于阿里云官方SDK（https://github.com/aliyun/aliyun-openapi-php-sdk/blob/master/aliyun-php-sdk-alidns/Alidns/Request/V20150109/UpdateDomainRecordRequest.php）修改单文件版本，测试环境：PHP 5.6
include_once 'alicloud-php-updaterecord/V20150109/AlicloudUpdateRecord.php';

use Roura\Alicloud\V20150109\AlicloudUpdateRecord;

// 此处填入阿里云AccessKey参数
$AccessKeyId     = 'LTAIJiCy17fPMFKa';
$AccessKeySecret = 'TUuWSCe3TvuN47hXQB6LMDkeJ6Stzv';
$updater         = new AlicloudUpdateRecord($AccessKeyId, $AccessKeySecret);

// 使用IP API服务（http://ip-api.com）获取当前服务器公网IP
$res = file_get_contents('http://ip-api.com/json');
$res OR exit(date('Y-m-d H:i:s').': No ip caught!'.PHP_EOL);
$res = json_decode($res, TRUE);
$newIp = $res['query'];

$updater->setDomainName('mutaoinc.net');
$updater->setRecordType('A');
$updater->setRR('s3');
$updater->setValue($newIp);
$res = $updater->sendRequest();

// 记录成功发送的响应日志
$msg = date('Y-m-d H:i:s').' Ip['.$newIp.'] caught, return code is "'.($res['Code']? $res['Code']: 'Success').'"['.$res['RequestId'].']'.PHP_EOL;
file_put_contents('log/UpdateDomainRecord_'.date('y-m').'.log', $msg, FILE_APPEND);
exit($msg);
