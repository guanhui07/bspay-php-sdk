<?php

/**
 * 快捷绑卡申请接口 - 示例
 *
 * @author sdk-generator
 * @Description
 */

namespace BsPayDemo;

// 1. 资源及配置加载
require_once dirname(__FILE__) . "/loader.php";
require_once dirname(__FILE__) . "/../BsPaySdk/request/V2QuickbuckleApplyRequest.php";

use BsPaySdk\core\BsPayClient;
use BsPaySdk\request\V2QuickbuckleApplyRequest;

// 2.组装请求参数
$request = new V2QuickbuckleApplyRequest();
// 请求日期
$request->setReqDate(date("Ymd"));
// 请求流水号
$request->setReqSeqId(date("YmdHis") . mt_rand());
// 汇付客户Id
$request->setHuifuId("6666000109133323");
// 商户用户id
$request->setOutCustId("6666000150648142");
// 订单号
$request->setOrderId("20220408105303542461831");
// 订单日期
$request->setOrderDate("20220408");
// 银行卡号
$request->setCardId("VDFveDULoK6qhWuN34P8XF7tuZow4eg74zEPKjNVwSjQTW572jqmYjpRDbEtX0f56hMQUfFv5wFRjvDIY+yTl+SFKgBmoNlPDm9B3mDjOa8er5FEnI5QWgvyuqSxHWJf2eIjU7OHt3q3/0ZsbetNzIAiaAZdicn9Sawsr9yZ8ZOdBmhIPO5tqJyDkoKO5Tpj0VyZMJ5ugSDx/2XGSmX3dHQ1JKlZ/7rovB+WchA9BzZQzSTcvmmdV6mzuyTPWRzxfhyVPAVLzh5XhKyl6SMKmzOM1zSNMPtzDhTaUG4XLSM5A0+Tqt3O4tSi16f5zn2csgwbN6TMd5jrXNzC8UTpdQ==");
// 银行卡开户姓名
$request->setCardName("dj1TYq2WxbX8ti/7QjuSCqYKzCusdDe/+1wIVx23iFvxMcxkiV0rUK8Hc1PTw4H+qy+6RkgDh06ZNH4EXmYpl/AhfSjyMlSgF1O1YR4/WvKzRciwo1FvEOtRU6X0isOjA+NA+lv4A7ejGTtJP3dyam0j/IsOYlOriT8aGtBgfsTw+Dc+e3coZ3iCTP0Iwk6fC/BSs/GpM7H21qcXR9OyewIgSQnU5PaV/TKTaCxtLZM+6xf8Cuulg/LK5Jth3pzEkLrY+eziftxd2jCn5E7a3pyRHVD4d5VeQZQ9kF87JFjWKhMTAOVV7znXE0hutZP124UNN48FgAyAEZa+k4fWfg==");
// 银行卡绑定证件类型
$request->setCertType("00");
// 银行卡绑定身份证
$request->setCertId("OLOxrl809XmVIMmPRTIyIpJHxi4HFMJNmxGz1nhZAtps9xPEVDysU3UZPBZfsNFLFcXEMENPsJ+tymbYt42dNQ+76hyEtx+qz0BQhU8SKV8H5itrI4kaXpaJf+sV8OewrJkhDidPdz01vqMEDQRhaMnNwl8snHZxDdpu7HVUz5JwsLYfBbZP2Q4CZpVWS3NunQahZ8zHQ+8EhvYVH1vE7f/M6nJt1/4GoHz9C/UnuYudV0S2uBhlywbX+YkRGNMl/oz5+UNeMDA2jqhtTreSD4+w7S82L53rqKsAbosodOPo4OAMZk4/0QOH5LDbqFByVM97mzHfw7z+Tx/dsXJ8QQ==");
// 个人证件有效期类型
$request->setCertValidityType("1");
// 个人证件有效期起始日
$request->setCertBeginDate("20210806");
// 个人证件有效期到期日长期有效不填；&lt;font color&#x3D;&quot;green&quot;&gt;示例值：20420905&lt;/font&gt;
$request->setCertEndDate("20410806");
// 银行卡绑定手机号
$request->setCardMp("fD4awMK+JdxQi+Qzl1xgJbgq4jlNTKFSKlts2C9hJhFbu0J6K7mHmViRh5wG3bDdYAKbKEAz+Uzd1xyEeYZsFNi3jQgu8gRv5sTsjHZHYIbvvq1ju2nLXrzq8kTzVXnWRXB0oHxy6EnN2xuvaC3mT89sW5BND09J7qy+Va3Y/t1nTqz4oEE5qL+TTjm6Fv6BY8ac/T2mKaeHtN27Ufj4hmJnGTtcTuoS0uQ6bEksQiTHwK2QG7EBMInnoYiJD15cAPwQeR0xmZNAwEXehtxvIAAfFpAiLqe/2G9whSyoT/BlsrhYf+958bis856dTm6Lf6nAVjQbNvh6Iyhdu7H1Rw==");
// CVV2信用卡交易专用需要密文传输。&lt;br/&gt;使用汇付RSA公钥加密(加密前3位，加密后最长2048位），[参见参考文档](https://paas.huifu.com/partners/guide/#/api_jiami_jiemi)；&lt;br/&gt;&lt;font color&#x3D;&quot;green&quot;&gt;示例值：Ly+fnExeyPOTzfOtgRRur77nJB9TAe4PGgK9M……fc6XJXZss&#x3D;&lt;/font&gt;
// $request->setVipCode("test");
// 卡有效期信用卡交易专用，格式：MMYY，需要密文传输；&lt;br/&gt;使用汇付RSA公钥加密(加密前4位，加密后最长2048位），[参见参考文档](https://paas.huifu.com/partners/guide/#/api_jiami_jiemi)；&lt;br/&gt;&lt;font color&#x3D;&quot;green&quot;&gt;示例值：Ly+fnExeyPOTzfOtgRRur77nJB9TAe4PGgK9M……fc6XJXZss&#x3D;JXZss&#x3D;&lt;/font&gt;
// $request->setExpiration("test");
// 挂网协议编号授权信息(招行绑卡需要上送)；&lt;font color&#x3D;&quot;green&quot;&gt;示例值：34463343&lt;/font&gt;
// $request->setProtocolNo("test");
// 设备信息域 
// $request->setTrxDeviceInf(getTrxDeviceInf());

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
    // 商户名称
    $extendInfoMap["merch_name"] = "测试";
    // 电子邮箱
    $extendInfoMap["email"] = "changliang.wang@huifu.com";
    // 卡的借贷类型
    // $extendInfoMap["dc_type"]= "";
    // 风控信息
    // $extendInfoMap["risk_info"]= getRiskInfo();
    return $extendInfoMap;
}

function getTrxDeviceInf()
{
    $dto = array();
    // 银行预留手机号
    // $dto["trx_mobile_num"] = "test";
    // 设备类型
    // $dto["trx_device_type"] = "test";
    // 交易设备IP
    // $dto["trx_device_ip"] = "test";
    // 交易设备MAC
    // $dto["trx_device_mac"] = "test";
    // 交易设备IMEI
    // $dto["trx_device_imei"] = "test";
    // 交易设备IMSI
    // $dto["trx_device_imsi"] = "test";
    // 交易设备ICCID
    // $dto["trx_device_icc_id"] = "test";
    // 交易设备WIFIMAC
    // $dto["trx_device_wfifi_mac"] = "test";
    // 交易设备GPS
    // $dto["trx_device_gps"] = "test";

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function getRiskInfo()
{
    $dto = array();
    // IP类型
    // $dto["ip_type"] = "test";
    // IP值
    // $dto["source_ip"] = "test";
    // 设备标识
    // $dto["device_id"] = "";
    // 设备类型
    // $dto["device_type"] = "";
    // 银行预留手机号
    // $dto["mobile"] = "";

    return json_encode($dto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}


