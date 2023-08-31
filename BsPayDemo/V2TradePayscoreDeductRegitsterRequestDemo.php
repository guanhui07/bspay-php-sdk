<?php

/**
 * 登记扣款信息 - 示例
 *
 * @author sdk-generator
 * @Description
 */
namespace BsPayDemo;

// 1. 资源及配置加载
require_once dirname(__FILE__) . "/loader.php";
require_once  dirname(__FILE__). "/../BsPaySdk/request/V2TradePayscoreDeductRegitsterRequest.php";

use BsPaySdk\core\BsPayClient;
use BsPaySdk\request\V2TradePayscoreDeductRegitsterRequest;

// 2.组装请求参数
$request = new V2TradePayscoreDeductRegitsterRequest();
// 请求日期
$request->setReqDate(date("Ymd"));
// 商户申请单号
$request->setReqSeqId(date("YmdHis").mt_rand());
// 汇付商户号
$request->setHuifuId("6666000108854952");

// 设置非必填字段
$extendInfoMap = getExtendInfos();
$request->setExtendInfo($extendInfoMap);

// 3. 发起API调用
$client = new BsPayClient();
$result = $client->postRequest($request);
if (!$result || $result->isError()) {  //失败处理
    var_dump($result -> getErrorInfo());
} else {    //成功处理
    var_dump($result);
}

/**
 * 非必填字段
 *
 */
function getExtendInfos() {
    // 设置非必填字段
    $extendInfoMap = array();
    // 汇付服务订单号
    // $extendInfoMap["out_order_no"]= "";
    // 创建服务订单返回的汇付全局流水号
    // $extendInfoMap["org_hf_seq_id"]= "";
    // 服务订单创建请求流水号
    // $extendInfoMap["org_req_seq_id"]= "";
    return $extendInfoMap;
}


