<?php

/**
 * 花呗分期活动查询 - 示例
 *
 * @author sdk-generator
 * @Description
 */

namespace BsPayDemo;

// 1. 资源及配置加载
require_once dirname(__FILE__) . "/loader.php";
require_once dirname(__FILE__) . "/../BsPaySdk/request/V2PcreditSolutionQueryRequest.php";

use BsPaySdk\core\BsPayClient;
use BsPaySdk\request\V2PcreditSolutionQueryRequest;

// 2.组装请求参数
$request = new V2PcreditSolutionQueryRequest();
// 请求流水号
$request->setReqSeqId(date("YmdHis") . mt_rand());
// 请求时间
$request->setReqDate(date("Ymd"));
// 汇付Id
$request->setHuifuId("6666000110468104");
// 活动方案id
$request->setSolutionId("mixed20211111000208590000000000563815");

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


