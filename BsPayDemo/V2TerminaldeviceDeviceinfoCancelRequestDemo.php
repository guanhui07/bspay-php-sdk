<?php

/**
 * 注销终端 - 示例
 *
 * @author sdk-generator
 * @Description
 */

namespace BsPayDemo;

// 1. 资源及配置加载
require_once dirname(__FILE__) . "/loader.php";
require_once dirname(__FILE__) . "/../BsPaySdk/request/V2TerminaldeviceDeviceinfoCancelRequest.php";

use BsPaySdk\core\BsPayClient;
use BsPaySdk\request\V2TerminaldeviceDeviceinfoCancelRequest;

// 2.组装请求参数
$request = new V2TerminaldeviceDeviceinfoCancelRequest();
// 请求流水号
$request->setReqSeqId(date("YmdHis") . mt_rand());
// 请求时间
$request->setReqDate(date("Ymd"));
// 汇付客户Id
$request->setHuifuId("6666000104575213");
// 终端号
$request->setDeviceId("660035140101000300901");

// 设置非必填字段
$extendInfoMap = getExtendInfos();
$request->setExtendInfo($extendInfoMap);

// 3. 发起API调用
$client = new BsPayClient();
$result = $client->postRequest($request);
if (!$result || $result->isError()) {  //失败处理
    var_dump($result->getErrorInfo());
} else {    //成功处理
    var_dump($result);
}

/**
 * 非必填字段
 *
 */
function getExtendInfos()
{
    // 设置非必填字段
    $extendInfoMap = array();
    return $extendInfoMap;
}


