<?php

/**
 * 微信直连-微信关注配置查询 - 示例
 *
 * @author sdk-generator
 * @Description
 */

namespace BsPayDemo;

// 1. 资源及配置加载
require_once dirname(__FILE__) . "/loader.php";
require_once dirname(__FILE__) . "/../BsPaySdk/request/V2MerchantDirectWechatSubscribeQueryRequest.php";

use BsPaySdk\core\BsPayClient;
use BsPaySdk\request\V2MerchantDirectWechatSubscribeQueryRequest;

// 2.组装请求参数
$request = new V2MerchantDirectWechatSubscribeQueryRequest();
// 请求流水号
$request->setReqSeqId(date("YmdHis") . mt_rand());
// 请求日期
$request->setReqDate(date("Ymd"));
// 汇付ID
$request->setHuifuId("6666000003098550");
// 开发者的应用ID
$request->setAppId("wxd2da4051c9e32b86");
// 商户号
$request->setMchId("1552470931");
// 特约商户号
$request->setSubMchid("1552470931");

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


