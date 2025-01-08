<?php

/**
 * 交易分账明细查询 - 示例
 *
 * @author sdk-generator
 * @Description
 */

namespace BsPayDemo;

// 1. 资源及配置加载
require_once dirname(__FILE__) . "/loader.php";
require_once dirname(__FILE__) . "/../BsPaySdk/request/V2TradeTransSplitQueryRequest.php";

use BsPaySdk\core\BsPayClient;
use BsPaySdk\request\V2TradeTransSplitQueryRequest;

// 2.组装请求参数
$request = new V2TradeTransSplitQueryRequest();
// 分账交易汇付全局流水号
$request->setHfSeqId("003500TOP2B230718174911P075ac139ccf00000");
// 商户号
$request->setHuifuId("6666000109133323");
// 交易类型
$request->setOrdType("consume");

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


