<?php

/**
 * 支付宝申诉请求凭证 - 示例
 *
 * @author sdk-generator
 * @Description
 */

namespace BsPayDemo;

// 1. 资源及配置加载
require_once dirname(__FILE__) . "/loader.php";
require_once dirname(__FILE__) . "/../BsPaySdk/request/V2MerchantComplaintRequestCertificatesRequest.php";

use BsPaySdk\core\BsPayClient;
use BsPaySdk\request\V2MerchantComplaintRequestCertificatesRequest;

// 2.组装请求参数
$request = new V2MerchantComplaintRequestCertificatesRequest();
// 请求汇付流水号
$request->setReqSeqId(date("YmdHis") . mt_rand());
// 请求汇付时间
$request->setReqDate(date("Ymd"));
// 支付宝推送流水号
$request->setRiskBizId("04a3d978689542ed6ba0295fbc2dc137-BANK");
// 商户类型
$request->setMerchantType("个体工商户");
// 商户经营模式
$request->setOperationType("线上");
// 收款应用场景
$request->setPaymentScene("通过小程序收款");

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


