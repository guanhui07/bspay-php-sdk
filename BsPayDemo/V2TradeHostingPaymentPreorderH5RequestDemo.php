<?php

/**
 * H5、PC预下单接口 - 示例
 *
 * @author sdk-generator
 * @Description
 */

namespace BsPayDemo;

// 1. 资源及配置加载
require_once dirname(__FILE__) . "/loader.php";
require_once dirname(__FILE__) . "/../BsPaySdk/request/V2TradeHostingPaymentPreorderH5Request.php";

use BsPaySdk\core\BsPayClient;
use BsPaySdk\request\V2TradeHostingPaymentPreorderH5Request;

// 2.组装请求参数
$request = new V2TradeHostingPaymentPreorderH5Request();
// 请求日期
$request->setReqDate(date("Ymd"));
// 请求流水号
$request->setReqSeqId(date("YmdHis") . mt_rand());
// 商户号
$request->setHuifuId("6666000109133323");
// 交易金额
$request->setTransAmt("0.10");
// 商品描述
$request->setGoodsDesc("支付托管消费");
// 预下单类型
$request->setPreOrderType("1");
// 半支付托管扩展参数集合
$request->setHostingData(getHostingData());

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
    // 收银台样式
    // $extendInfoMap["style_id"]= "";
    // 是否延迟交易
    $extendInfoMap["delay_acct_flag"] = "N";
    // 分账对象
    $extendInfoMap["acct_split_bunch"] = getAcctSplitBunch();
    // 交易失效时间
    // $extendInfoMap["time_expire"]= "";
    // 业务信息
    $extendInfoMap["biz_info"] = getBizInfo();
    // 交易异步通知地址
    $extendInfoMap["notify_url"] = "https://callback.service.com/xx";
    // 使用类型
    // $extendInfoMap["usage_type"]= "";
    // 交易类型
    // $extendInfoMap["trans_type"]= "";
    // 微信参数集合
    // $extendInfoMap["wx_data"]= getWxData();
    // 支付宝参数集合
    // $extendInfoMap["alipay_data"]= getAlipayData();
    // 银联参数集合
    // $extendInfoMap["unionpay_data"]= getUnionpayData();
    return $extendInfoMap;
}

function getAcctInfosRucan()
{
    $dto = array();
    // 分账金额
    $dto["div_amt"] = "0.08";
    // 分账接收方ID
    $dto["huifu_id"] = "6666000111546360";

    $dtoList = array();
    array_push($dtoList, $dto);
    return $dtoList;
}

function getAcctSplitBunch()
{
    $dto = array();
    // 分账明细
    $dto["acct_infos"] = getAcctInfosRucan();

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getHostingData()
{
    $dto = array();
    // 项目标题
    $dto["project_title"] = "收银台标题";
    // 半支付托管项目号
    $dto["project_id"] = "PROJECTID2023101225142567";
    // 请求类型P:PC页面版，默认：P；M:H5页面版；指定交易类型时必填；&lt;font color&#x3D;&quot;green&quot;&gt;示例值：M&lt;/font&gt;
    // $dto["request_type"] = "test";
    // 商户私有信息
    $dto["private_info"] = "商户私有信息test";
    // 回调地址
    $dto["callback_url"] = "https://paas.huifu.com";

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getPayerCheckAli()
{
    $dto = array();
    // 是否提供校验身份信息
    $dto["need_check_info"] = "T";
    // 允许的最小买家年龄
    $dto["min_age"] = "12";
    // 是否强制校验付款人身份信息
    $dto["fix_buyer"] = "F";

    return $dto;
}

function getPayerCheckWx()
{
    $dto = array();
    // 指定支付者
    $dto["limit_payer"] = "ADULT";
    // 微信实名验证
    $dto["real_name_flag"] = "Y";

    return $dto;
}

function getPersonPayer()
{
    $dto = array();
    // 姓名
    $dto["name"] = "张三";
    // 证件类型
    $dto["cert_type"] = "IDENTITY_CARD";
    // 证件号
    $dto["cert_no"] = "OLOxrl809XmVIMmPRTIyIpJHxi4HFMJNmxGz1nhZAtps9xPEVDysU3UZPBZfsNFLFcXEMENPsJ+tymbYt42dNQ+76hyEtx+qz0BQhU8SKV8H5itrI4kaXpaJf+sV8OewrJkhDidPdz01vqMEDQRhaMnNwl8snHZxDdpu7HVUz5JwsLYfBbZP2Q4CZpVWS3NunQahZ8zHQ+8EhvYVH1vE7f/M6nJt1/4GoHz9C/UnuYudV0S2uBhlywbX+YkRGNMl/oz5+UNeMDA2jqhtTreSD4+w7S82L53rqKsAbosodOPo4OAMZk4/0QOH5LDbqFByVM97mzHfw7z+Tx/dsXJ8QQ==";
    // 手机号
    $dto["mobile"] = "15012345678";

    return $dto;
}

function getBizInfo()
{
    $dto = array();
    // 付款人验证（支付宝）
    $dto["payer_check_ali"] = getPayerCheckAli();
    // 付款人验证（微信）
    $dto["payer_check_wx"] = getPayerCheckWx();
    // 个人付款人信息
    $dto["person_payer"] = getPersonPayer();

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getGoodsDetailWxRucan()
{
    $dto = array();
    // 商品编码
    // $dto["goods_id"] = "";
    // 商品名称
    // $dto["goods_name"] = "";
    // 商品单价(元)
    // $dto["price"] = "";
    // 商品数量
    // $dto["quantity"] = "";
    // 微信侧商品编码
    // $dto["wxpay_goods_id"] = "";

    $dtoList = array();
    array_push($dtoList, $dto);
    return $dtoList;
}

function getDetail()
{
    $dto = array();
    // 单品列表
    // $dto["goods_detail"] = getGoodsDetailWxRucan();
    // 订单原价(元)
    // $dto["cost_price"] = "";
    // 商品小票ID
    // $dto["receipt_id"] = "";

    return $dto;
}

function getStoreInfo()
{
    $dto = array();
    // 门店id
    // $dto["id"] = "";
    // 门店名称
    // $dto["name"] = "";
    // 门店行政区划码
    // $dto["area_code"] = "";
    // 门店详细地址
    // $dto["address"] = "";

    return $dto;
}

function getSceneInfo()
{
    $dto = array();
    // 门店信息
    // $dto["store_info"] = getStoreInfo();

    return $dto;
}

function getWxData()
{
    $dto = array();
    // 附加数据
    // $dto["attach"] = "";
    // 商品详情
    // $dto["detail"] = getDetail();
    // 订单优惠标记
    // $dto["goods_tag"] = "";
    // 开发票入口开放标识
    // $dto["receipt"] = "";
    // 场景信息
    // $dto["scene_info"] = getSceneInfo();
    // 单品优惠标识
    // $dto["promotion_flag"] = "";
    // 新增商品ID
    // $dto["product_id"] = "";

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getExtendParams()
{
    $dto = array();
    // 卡类型
    // $dto["card_type"] = "";
    // 支付宝点餐场景类型
    // $dto["food_order_type"] = "";
    // 花呗分期数
    // $dto["hb_fq_num"] = "";
    // 花呗卖家手续费百分比
    // $dto["hb_fq_seller_percent"] = "";
    // 行业数据回流信息
    // $dto["industry_reflux_info"] = "";
    // 信用卡分期资产方式
    // $dto["fq_channels"] = "";
    // 停车场id
    // $dto["parking_id"] = "";
    // 系统商编号
    // $dto["sys_service_provider_id"] = "";

    return $dto;
}

function getGoodsDetail()
{
    $dto = array();
    // 商品编码
    // $dto["goods_id"] = "test";
    // 商品优惠金额
    // $dto["discount_amount"] = "test";
    // 商品数量
    // $dto["quantity"] = "test";
    // 商品价格
    // $dto["price"] = "test";
    // 商品备注
    // $dto["goods_remark"] = "";

    $dtoList = array();
    array_push($dtoList, $dto);
    return $dtoList;
}

function getAlipayData()
{
    $dto = array();
    // 支付宝的店铺编号
    // $dto["alipay_store_id"] = "";
    // 业务扩展参数
    // $dto["extend_params"] = getExtendParams();
    // 订单包含的商品列表信息
    // $dto["goods_detail"] = getGoodsDetail();
    // 商户原始订单号
    // $dto["merchant_order_no"] = "";
    // 商户操作员编号
    // $dto["operator_id"] = "";
    // 销售产品码
    // $dto["product_code"] = "";
    // 卖家支付宝用户号
    // $dto["seller_id"] = "";
    // 商户门店编号
    // $dto["store_id"] = "";
    // 订单标题
    // $dto["subject"] = "";
    // 商家门店名称
    // $dto["store_name"] = "";
    // 商户业务信息
    // $dto["ali_business_params"] = "";

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getPayeeInfo()
{
    $dto = array();
    // 商户类别
    // $dto["mer_cat_code"] = "";
    // 二级商户代码
    // $dto["sub_id"] = "";
    // 二级商户名称
    // $dto["sub_name"] = "";
    // 终端号
    // $dto["term_id"] = "";

    return $dto;
}

function getUnionpayData()
{
    $dto = array();
    // 收款方附加数据
    // $dto["addn_data"] = "";
    // 地区信息
    // $dto["area_info"] = "";
    // 前台通知地址
    // $dto["front_url"] = "";
    // 收款方附言
    // $dto["payee_comments"] = "";
    // 收款方信息
    // $dto["payee_info"] = getPayeeInfo();
    // 银联分配的服务商机构标识码
    // $dto["pnr_ins_id_cd"] = "";
    // 请求方自定义域
    // $dto["req_reserved"] = "";
    // 终端信息
    // $dto["term_info"] = "";

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}


