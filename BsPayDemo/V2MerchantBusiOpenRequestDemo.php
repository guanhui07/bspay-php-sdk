<?php

/**
 * 商户业务开通(2022) - 示例
 *
 * @author sdk-generator
 * @Description
 */

namespace BsPayDemo;

// 1. 资源及配置加载
require_once dirname(__FILE__) . "/loader.php";
require_once dirname(__FILE__) . "/../BsPaySdk/request/V2MerchantBusiOpenRequest.php";

use BsPaySdk\core\BsPayClient;
use BsPaySdk\request\V2MerchantBusiOpenRequest;

// 2.组装请求参数
$request = new V2MerchantBusiOpenRequest();
// 请求流水号
$request->setReqSeqId(date("YmdHis") . mt_rand());
// 请求日期
$request->setReqDate(date("Ymd"));
// 汇付客户Id
$request->setHuifuId("6666000104778898");
// 直属渠道号
$request->setUpperHuifuId("6666000003080000");

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
    // 经营简称
    $extendInfoMap["short_name"] = "简称";
    // 税务登记证
    $extendInfoMap["tax_reg_pic"] = "";
    // 公司照片一
    $extendInfoMap["comp_pic1"] = "de2f6e1d-d9e9-3898-9b66-af2a96054193";
    // 公司照片二
    $extendInfoMap["comp_pic2"] = "de2f6e1d-d9e9-3898-9b66-af2a96054193";
    // 公司照片三
    $extendInfoMap["comp_pic3"] = "de2f6e1d-d9e9-3898-9b66-af2a96054193";
    // 法人身份证反面
    $extendInfoMap["legal_cert_back_pic"] = "de2f6e1d-d9e9-3898-9b66-af2a96054193";
    // 法人身份证正面
    $extendInfoMap["legal_cert_front_pic"] = "de2f6e1d-d9e9-3898-9b66-af2a96054193";
    // 营业执照图片
    $extendInfoMap["license_pic"] = "de2f6e1d-d9e9-3898-9b66-af2a96054193";
    // 组织机构代码证
    $extendInfoMap["org_code_pic"] = "";
    // 开户许可证
    $extendInfoMap["reg_acct_pic"] = "de2f6e1d-d9e9-3898-9b66-af2a96054193";
    // 结算卡反面
    $extendInfoMap["settle_card_back_pic"] = "";
    // 结算卡正面
    $extendInfoMap["settle_card_front_pic"] = "";
    // 结算人身份证反面
    $extendInfoMap["settle_cert_back_pic"] = "";
    // 结算人身份证正面
    $extendInfoMap["settle_cert_front_pic"] = "";
    // 授权委托书
    $extendInfoMap["auth_enturst_pic"] = "66d07a27-ccdd-3a0b-9288-8af099d6a3a8";
    // 协议信息实体
    $extendInfoMap["agreement_info"] = getAgreementInfo();
    // 是否交易手续费外扣
    $extendInfoMap["out_fee_flag"] = "2";
    // 交易手续费外扣汇付ID
    $extendInfoMap["out_fee_huifuid"] = "";
    // 交易手续费外扣时的账户类型
    $extendInfoMap["out_fee_acct_type"] = "";
    // 是否开通网银
    $extendInfoMap["online_flag"] = "Y";
    // 是否开通快捷
    $extendInfoMap["quick_flag"] = "Y";
    // 是否开通代扣
    $extendInfoMap["withhold_flag"] = "Y";
    // 延迟入账开关
    $extendInfoMap["delay_flag"] = "Y";
    // 商户开通强制延迟标记
    $extendInfoMap["forced_delay_flag"] = "Y";
    // 是否开通预授权
    $extendInfoMap["alipay_pre_auth_flag"] = "N";
    // 开通微信预授权
    $extendInfoMap["wechatpay_pre_auth_flag"] = "N";
    // 商户业务类型
    // $extendInfoMap["mer_bus_type"]= "";
    // 线上费率配置
    // $extendInfoMap["online_fee_conf_list"]= getOnlineFeeConfList();
    // 支付宝配置对象
    $extendInfoMap["ali_conf_list"] = getAliConfList();
    // 微信配置对象
    $extendInfoMap["wx_conf_list"] = getWxConfList();
    // 银联二维码配置
    $extendInfoMap["union_conf_list"] = getUnionConfList();
    // 银行卡业务配置
    $extendInfoMap["bank_card_conf"] = getBankCardConf();
    // 银联小微入驻信息实体
    // $extendInfoMap["union_micro_info"]= getUnionMicroInfo();
    // 余额支付配置实体
    $extendInfoMap["balance_pay_config"] = getBalancePayConfig();
    // 补贴支付
    $extendInfoMap["combine_pay_config"] = getCombinePayConfig();
    // 花呗分期费率配置实体
    $extendInfoMap["hb_fq_fee_config"] = getHbFqFeeConfig();
    // 线上手续费承担方配置
    // $extendInfoMap["online_pay_fee_conf_list"]= getOnlinePayFeeConfList();
    // 银行大额转账对象
    // $extendInfoMap["bank_big_amt_pay_config"]= getBankBigAmtPayConfig();
    // 全域资金管理配置
    // $extendInfoMap["out_order_funds_config"]= getOutOrderFundsConfig();
    // 汇总结算配置实体
    // $extendInfoMap["collection_settle_config_list"]= getCollectionSettleConfigList();
    // 是否使用总部交易信息
    // $extendInfoMap["use_chains_flag"]= "";
    // 异步消息接收地址
    $extendInfoMap["async_return_url"] = "http://192.168.85.157:30031/sspm/testVirgo";
    // 业务开通结果异步消息接收地址
    $extendInfoMap["busi_async_return_url"] = "";
    // 交易异步应答地址
    $extendInfoMap["recon_resp_addr"] = "http://192.168.85.157:30031/sspm/testVirgo";
    // 微信直连配置对象
    // $extendInfoMap["wx_zl_conf"]= getWxZlConf();
    // 支付宝直连配置对象
    // $extendInfoMap["ali_zl_conf"]= getAliZlConf();
    // 开户费用值(元)
    // $extendInfoMap["enter_fee"]= "";
    // 开户费用类型
    // $extendInfoMap["enter_fee_flag"]= "";
    return $extendInfoMap;
}

function getAgreementInfo()
{
    $dto = array();
    // 协议类型
    $dto["agreement_type"] = "0";
    // 协议号
    $dto["agreement_no"] = "202106070100000380";
    // 协议模板号
    $dto["agreement_model"] = "202106070100000380";
    // 协议模板名称
    $dto["agreement_name"] = "电子协议签约模板";
    // 签约日期
    $dto["sign_date"] = "20200325";
    // 协议开始日期
    $dto["agree_begin_date"] = "20200325";
    // 协议结束日期
    $dto["agree_end_date"] = "20400325";

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getOnlineFeeConfList()
{
    $dto = array();
    // 业务类型
    // $dto["fee_type"] = "test";
    // 银行编码
    // $dto["bank_id"] = "test";
    // 借贷标志
    // $dto["dc_flag"] = "test";
    // 费率状态
    // $dto["stat_flag"] = "test";
    // 手续费（固定/元）
    // $dto["fix_amt"] = "";
    // 费率（百分比/%）
    // $dto["fee_rate"] = "";
    // 银行名称
    // $dto["bank_name"] = "";
    // 银行中文简称
    // $dto["bank_short_chn"] = "";

    $dtoList = array();
    array_push($dtoList, $dto);
    return json_encode($dtoList, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getAliConfList()
{
    $dto = array();
    // 支付场景
    $dto["pay_scene"] = "1";
    // 手续费（%）
    $dto["fee_rate"] = "0.38";
    // 商户经营类目
    $dto["mcc"] = "2015091000052157";
    // 子渠道号
    $dto["pay_channel_id"] = "JQF00001";
    // 拟申请的间联商户等级
    $dto["indirect_level"] = "";

    $dtoList = array();
    array_push($dtoList, $dto);
    return json_encode($dtoList, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getWxConfList()
{
    $dto = array();
    // 支付场景
    $dto["pay_scene"] = "1";
    // 手续费（%）
    $dto["fee_rate"] = "0.38";
    // 费率规则号
    $dto["fee_rule_id"] = "758";
    // 商户经营类目[参见微信支付宝MCC](https://paas.huifu.com/open/doc/api/#/csfl/api_csfl_zfbmcc)；个体工商户、小微商户必填；微信暂不支持修改；&lt;font color&#x3D;&quot;green&quot;&gt;示例值：5411&lt;/font&gt;&lt;br/&gt;**企业使用fee_rule_id代替原有mcc**
    $dto["mcc"] = "111";
    // 子渠道号
    $dto["pay_channel_id"] = "JP00001";
    // 申请服务
    $dto["service_codes"] = "";

    $dtoList = array();
    array_push($dtoList, $dto);
    return json_encode($dtoList, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getUnionConfList()
{
    $dto = array();
    // 借记卡手续费1000以上（%）
    $dto["debit_fee_rate_up"] = "0.55";
    // 银联二维码业务贷记卡手续费1000以上（%）
    $dto["credit_fee_rate_up"] = "0.56";
    // 借记卡手续费1000以下（%）
    $dto["debit_fee_rate_down"] = "0.38";
    // 银联二维码业务贷记卡手续费1000以下（%）
    $dto["credit_fee_rate_down"] = "0.38";
    // 银联业务手续费类型
    $dto["charge_cate_code"] = "03";
    // 借记卡封顶1000以上
    $dto["debit_fee_limit_up"] = "20";
    // 借记卡封顶1000以下
    $dto["debit_fee_limit_down"] = "10";
    // 商户经营类目
    $dto["mcc"] = "5411";

    $dtoList = array();
    array_push($dtoList, $dto);
    return json_encode($dtoList, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getBankCardConf()
{
    $dto = array();
    // 借记卡手续费（%）
    $dto["debit_fee_rate"] = "0.38";
    // 贷记卡手续费（%）
    $dto["credit_fee_rate"] = "0.39";
    // 商户经营类目
    $dto["mcc"] = "5411";
    // 银行业务手续费类型
    $dto["charge_cate_code"] = "02";
    // 借记卡封顶值
    $dto["debit_fee_limit"] = "0.56";
    // 银联手机闪付借记卡手续费1000以上（%）
    $dto["cloud_debit_fee_rate_up"] = "0.56";
    // 银联手机闪付借记卡封顶1000以上(元)
    $dto["cloud_debit_fee_limit_up"] = "12";
    // 银联手机闪付贷记卡手续费1000以上（%）
    $dto["cloud_credit_fee_rate_up"] = "0.59";
    // 银联手机闪付借记卡手续费1000以下（%）
    $dto["cloud_debit_fee_rate_down"] = "0.37";
    // 银联手机闪付借记卡封顶1000以下(元)
    $dto["cloud_debit_fee_limit_down"] = "5";
    // 银联手机闪付贷记卡手续费1000以下（%）
    $dto["cloud_credit_fee_rate_down"] = "0.36";
    // 是否开通小额双免
    $dto["is_open_small_flag"] = "0";
    // 小额双免单笔限额(元)
    $dto["small_free_amt"] = "1000";
    // 小额双免手续费（%）
    $dto["small_fee_amt"] = "0.33";

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getUnionMicroInfo()
{
    $dto = array();
    // 银联商户类别
    // $dto["mchnt_type"] = "test";
    // 商户经度
    // $dto["mer_lng"] = "test";
    // 商户纬度
    // $dto["mer_lat"] = "test";
    // 店铺名称
    // $dto["shop_name"] = "test";
    // 商户经营类目
    // $dto["mcc"] = "test";

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getBalancePayConfig()
{
    $dto = array();
    // 支付手续费(%)
    $dto["fee_rate"] = "2";
    // 支付固定手续费(元)
    $dto["fee_fix_amt"] = "1";
    // 交易手续费外扣时的账户类型
    // $dto["out_fee_acct_type"] = "";
    // 交易手续费外扣汇付ID
    // $dto["out_fee_huifuid"] = "";
    // 是否交易手续费外扣
    // $dto["out_fee_flag"] = "";

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getCombinePayConfig()
{
    $dto = array();
    // 支付手续费(%)
    $dto["fee_rate"] = "10";
    // 支付固定手续费(元)
    $dto["fee_fix_amt"] = "5";
    // 交易手续费外扣时的账户类型
    // $dto["out_fee_acct_type"] = "";
    // 交易手续费外扣汇付ID
    // $dto["out_fee_huifuid"] = "";
    // 是否交易手续费外扣
    // $dto["out_fee_flag"] = "";

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getHbFqFeeConfig()
{
    $dto = array();
    // 花呗收单分期3期（%）分期费率不为空时，收单费率必填，大于0，保留2位小数，不小于渠道商成本；&lt;font color&#x3D;&quot;green&quot;&gt;示例值：1.0&lt;/font&gt;代表费率为1.00%
    $dto["acq_three_period"] = "1.30";
    // 花呗收单分期6期（%）分期费率不为空时，收单费率必填，大于0，保留2位小数，不小于渠道商成本；&lt;font color&#x3D;&quot;green&quot;&gt;示例值：1.0&lt;/font&gt;代表费率为1.00%
    $dto["acq_six_period"] = "4.60";
    // 花呗收单分期12期（%）分期费率不为空时，收单费率必填，大于0，保留2位小数，不小于渠道商成本；&lt;font color&#x3D;&quot;green&quot;&gt;示例值：1.0&lt;/font&gt;代表费率为1.00%
    $dto["acq_twelve_period"] = "9.12";
    // 花呗分期3期（%）
    $dto["three_period"] = "1.80";
    // 花呗分期6期（%）
    $dto["six_period"] = "4.60";
    // 花呗分期12期（%）
    $dto["twelve_period"] = "9.12";
    // 商户经营类目
    $dto["ali_mcc"] = "5411";
    // 支付场景
    $dto["pay_scene"] = "1";

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getOnlinePayFeeConfList()
{
    $dto = array();
    // 业务类型
    // $dto["pay_type"] = "";
    // 交易手续费外扣时的账户类型
    // $dto["out_fee_acct_type"] = "";
    // 交易手续费外扣汇付ID
    // $dto["out_fee_huifuid"] = "";
    // 是否交易手续费外扣
    // $dto["out_fee_flag"] = "";

    $dtoList = array();
    array_push($dtoList, $dto);
    return json_encode($dtoList, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getBankBigAmtPayConfig()
{
    $dto = array();
    // 大额转账调账标识申请类型
    // $dto["biz_type"] = "";
    // 费率（百分比/%）
    // $dto["fee_rate"] = "";
    // 交易手续费（固定/元）
    // $dto["fee_fix_amt"] = "";
    // 手续费外扣标记
    // $dto["out_fee_flag"] = "";
    // 手续费外扣时的汇付ID
    // $dto["out_fee_huifuid"] = "";
    // 外扣手续费费承担账户号
    // $dto["out_fee_acct_id"] = "";
    // 银行大额转账单笔额度
    // $dto["big_amt_limit_per_time"] = "";
    // 银行大额转账单日额度
    // $dto["big_amt_limit_per_day"] = "";

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getOutOrderAcctCard()
{
    $dto = array();
    // 支行联行号card_type为0时必填，参考：[银行支行编码](https://paas.huifu.com/open/doc/api/#/csfl/api_csfl_yhzhbm)；&lt;font color&#x3D;&quot;green&quot;&gt;示例值：102290026507&lt;/font&gt;
    // $dto["branch_code"] = "test";
    // 支行名称card_type为0时必填 ,参考：[银行支行编码](https://paas.huifu.com/open/doc/api/#/csfl/api_csfl_yhzhbm)；&lt;br/&gt;&lt;font color&#x3D;&quot;green&quot;&gt;示例值：中国工商银行上海市中山北路支行&lt;/font&gt;
    // $dto["branch_name"] = "test";
    // 结算账户名
    // $dto["card_name"] = "test";
    // 银行卡号
    // $dto["card_no"] = "test";
    // 卡类型
    // $dto["card_type"] = "test";
    // 持卡人证件类型00:身份证；&lt;font color&#x3D;&quot;green&quot;&gt;示例值：00&lt;/font&gt;；card_type为1时选填。
    // $dto["cert_type"] = "test";
    // 持卡人证件有效期（起始）card_type为1时选填；格式：yyyyMMdd，&lt;font color&#x3D;&quot;green&quot;&gt;示例值：20210830&lt;/font&gt;；&lt;br/&gt;若填写cert_no，cert_validity_type，cert_type需同时填写。
    // $dto["cert_begin_date"] = "test";
    // 持卡人证件有效期（截止）cert_validity_type变更为0时必填，格式：yyyyMMdd；&lt;font color&#x3D;&quot;green&quot;&gt;示例值：20210830&lt;/font&gt;
    // $dto["cert_end_date"] = "test";
    // 持卡人证件号码card_type为1时选填；&lt;font color&#x3D;&quot;green&quot;&gt;示例值：310112200001018888&lt;/font&gt;；
    // $dto["cert_no"] = "test";
    // 银行卡绑定手机号
    // $dto["mp"] = "test";
    // 开户许可证核准号
    // $dto["open_licence_no"] = "test";
    // 银行所在省
    // $dto["prov_id"] = "";
    // 银行所在市
    // $dto["area_id"] = "";
    // 银行编码
    // $dto["bank_code"] = "";
    // 持卡人证件有效期类型
    // $dto["cert_validity_type"] = "";

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getOutOrderAcctOpenFees()
{
    $dto = array();
    // 开户手续费(元)
    // $dto["fee_fix_amt"] = "test";
    // 开户手续费外扣时的账户类型
    // $dto["out_fee_acct_type"] = "test";
    // 开户手续费外扣汇付ID
    // $dto["out_fee_huifuid"] = "test";

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getOutOrderFundsConfig()
{
    $dto = array();
    // 自动入账开关
    // $dto["out_order_auto_acct_flag"] = "test";
    // 批次入账时间10:00-10点批次入账&lt;br/&gt;16:00-16点批次入账&lt;/br&gt;开通批次入账时必填 ，多个批次使用逗号分隔；&lt;font color&#x3D;&quot;green&quot;&gt;示例值：10:00,16:00&lt;/font&gt;
    // $dto["batch_no"] = "test";
    // 全域资金平台商户ID全域资金平台商户ID，渠道商在银行开通的平台商账号，若为众邦银行则必填，否则不填；&lt;font color&#x3D;&quot;green&quot;&gt;示例值：XXXXXXXXX&lt;/font&gt;；
    // $dto["platform_mer_id"] = "test";
    //  商户与其他支付机构签署的收单协议或证明材料acquiringMode：收单模式时填写；涉及文件类型：F504-(全域资金)商户与其他支付机构签署的收单协议或证明材料；&lt;br/&gt;&lt;font color&#x3D;&quot;green&quot;&gt;示例值：57cc7f00-600a-33ab-b614-6221bbf2e529&lt;/font&gt;
    // $dto["other_payment_institutions_pic"] = "test";
    // 批量入账开关
    // $dto["batch_auto_acct_flag"] = "";
    // 支付手续费(%)
    // $dto["fee_rate"] = "";
    // 手续费最小值(元)
    // $dto["fee_min_amt"] = "";
    // 交易手续费外扣时的账户类型
    // $dto["out_fee_acct_type"] = "";
    // 交易手续费外扣标记
    // $dto["out_fee_flag"] = "";
    // 交易手续费外扣汇付ID
    // $dto["out_fee_huifuid"] = "";
    // 全域资金开户银行卡信息
    // $dto["out_order_acct_card"] = getOutOrderAcctCard();
    // 全域资金开户手续费
    // $dto["out_order_acct_open_fees"] = getOutOrderAcctOpenFees();
    // 全域支付业务模式
    // $dto["business_model"] = "";

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getCollectionSettleConfigList()
{
    $dto = array();
    // 归集留存金(元)
    // $dto["out_resv_amt"] = "test";
    // 转入商户号
    // $dto["in_huifu_id"] = "test";
    // 转入账户
    // $dto["in_acct_id"] = "test";
    // 生效日期
    // $dto["valid_date"] = "test";
    // 转出账户
    // $dto["out_acct_id"] = "";

    $dtoList = array();
    array_push($dtoList, $dto);
    return json_encode($dtoList, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getWxZlPayConfList()
{
    $dto = array();
    // 申请服务
    // $dto["service_code"] = "test";
    // 功能服务appid
    // $dto["sub_app_id"] = "test";
    // 功能开关
    // $dto["switch_state"] = "test";
    // 功能费率(%)
    // $dto["fee_rate"] = "test";

    $dtoList = array();
    array_push($dtoList, $dto);
    return $dtoList;
}

function getWxZlConf()
{
    $dto = array();
    // 微信子商户号
    // $dto["sub_mch_id"] = "test";
    // 配置集合
    // $dto["wx_zl_pay_conf_list"] = getWxZlPayConfList();

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getFileList()
{
    $dto = array();
    // 文件类型
    // $dto["file_type"] = "test";
    // 文件jfileId
    // $dto["file_id"] = "test";

    $dtoList = array();
    array_push($dtoList, $dto);
    return json_encode($dtoList, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getAliZlConf()
{
    $dto = array();
    // 申请类型
    // $dto["apply_type"] = "test";
    // 商户支付宝账号
    // $dto["account"] = "test";
    // 服务费率仅支持渠道商。平台商户调用不支持该字段服务费率（%），0.38~3之间，精确到0.01。&lt;font color&#x3D;&quot;green&quot;&gt;示例值：0.06&lt;/font&gt;
    // $dto["fee_rate"] = "test";
    // 文件列表
    // $dto["file_list"] = getFileList();
    // 联系人姓名
    // $dto["contact_name"] = "";
    // 联系人手机号
    // $dto["contact_mobile_no"] = "";
    // 联系人电子邮箱
    // $dto["contact_email"] = "";
    // 订单授权凭证
    // $dto["order_ticket"] = "";
    // 营业执照编号
    // $dto["license_code"] = "";
    // 营业执照有效期类型
    // $dto["license_validity_type"] = "";
    // 营业执照有效期开始日期
    // $dto["license_begin_date"] = "";
    // 营业执照有效期截止日期
    // $dto["license_end_date"] = "";

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}


