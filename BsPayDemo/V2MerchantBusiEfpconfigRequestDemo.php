<?php

/**
 * 全域资金管理配置 - 示例
 *
 * @author sdk-generator
 * @Description
 */
namespace BsPayDemo;

// 1. 资源及配置加载
require_once dirname(__FILE__) . "/loader.php";
require_once  dirname(__FILE__). "/../BsPaySdk/request/V2MerchantBusiEfpconfigRequest.php";

use BsPaySdk\core\BsPayClient;
use BsPaySdk\request\V2MerchantBusiEfpconfigRequest;

// 2.组装请求参数
$request = new V2MerchantBusiEfpconfigRequest();
// 请求流水号
$request->setReqSeqId(date("YmdHis").mt_rand());
// 请求日期
$request->setReqDate(date("Ymd"));
// 商户汇付id
$request->setHuifuId("6666000108139646");
// 所属渠道商
$request->setUpperHuifuId("6666000108120249");
// 开关
$request->setSwitchState("1");
// 自动入账开关0:关闭 1:开通；switch_state为1时必填；&lt;font color&#x3D;&quot;green&quot;&gt;示例值：1&lt;/font&gt;
$request->setOutOrderAutoAcctFlag("1");
// 支付手续费外扣汇付ID支付手续费外扣标记为1时必填；&lt;font color&#x3D;&quot;green&quot;&gt;示例值：6666000109812123&lt;/font&gt;
$request->setOutFeeHuifuid("");
// 全域资金开户使用的银行卡信息首次开通时必填 jsonObject格式
$request->setOutOrderAcctCard("{\"area_id\":\"310100\",\"card_name\":\"圆务铁白事\",\"card_no\":\"4340622119959288\",\"card_type\":\"0\",\"prov_id\":\"310000\",\"bank_code\":\"01050000\",\"branch_code\":\"105290071113\",\"branch_name\":\"中国建设银行股份有限公司上海市中支行\",\"cert_begin_date\":\"20240314\",\"cert_end_date\":\"\",\"cert_no\":\"340000199810170714\",\"cert_type\":\"00\",\"cert_validity_type\":\"1\",\"mp\":\"13777842539\",\"open_licence_no\":\"123456789\"}");
// 全域资金开户手续费首次开通时必填 jsonObject格式
$request->setOutOrderAcctOpenFees("{\"fee_fix_amt\":\"0\",\"out_fee_acct_type\":\"\",\"out_fee_huifuid\":\"\"}");
// 商户与其他支付机构签署的收单协议文件id首次开通时必填；&lt;font color&#x3D;&quot;green&quot;&gt;示例值：57cc7f00-600a-33ab-b614-6221bbf2e530&lt;/font&gt;
$request->setOtherPaymentInstitutionsPic("8c4f6254-6c36-3b3c-ae8b-efcf24ca215e");
// 银行类型
$request->setOutFundsGateId("xw0");
// 签约人信息switch_state为1时必填 jsonObject格式
$request->setSignUserInfo("{\"type\":\"LEGAL\",\"mobile_no\":\"13777842539\"}");

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
    // 支付手续费百分比
    $extendInfoMap["fee_rate"]= "0.04";
    // 支付手续费最小值
    $extendInfoMap["fee_min_amt"]= "";
    // 支付手续费外扣账户类型
    $extendInfoMap["out_fee_acct_type"]= "";
    // 支付手续费外扣标记
    $extendInfoMap["out_fee_flag"]= "2";
    // 业务模式
    $extendInfoMap["business_model"]= "acquiringMode";
    // 异步消息接收地址
    $extendInfoMap["async_return_url"]= "http://service.example.com/to/path";
    // 业务开通结果异步消息接收地址
    $extendInfoMap["busi_async_return_url"]= "http://service.example.com/to/path";
    // 申请单笔限额
    $extendInfoMap["pay_every_deal"]= "";
    // 申请单日限额
    $extendInfoMap["pay_every_day"]= "";
    // 入账来源
    $extendInfoMap["acct_source"]= "01";
    return $extendInfoMap;
}


