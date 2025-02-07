# 简介

为了提高客户接入的便捷性，本系统提供 SDK 方式介入，使用本 SDK 将极大的简化开发者的工作，
开发者将无需考虑通信、签名、验签等，只需要关注业务参数的输入。

# 下载地址

[SDK下载](https://paas.huifu.com/partners/devtools/#/sdk_php)

# 版本记录

| 版本 | 日期 | 版本说明 | 
| :--- | :--- | :--- | 
| v1.0.0 | 2021/05/06 | 初始版本 |
| v1.0.1 | 2021/08/23 | 实现通用接口请求客户端演示demo，实现部分支付功能的封装 |
| v1.1.0 | 2021/10/12 | 对接新版斗拱 API 接口 |
| v1.1.1 | 2021/11/02 | 封装余额支付、取现、代发模块对象 |
| v1.1.2 | 2021/12/08 | 1. 封装快捷代扣、延时交易、商户管理模块； <br>2. 优化 huifuid 方法参数，默认从配置文件中读取 |
| v1.1.3 | 2021/12/13 | 1. 优化 huifuid 方法参数 <br>2. 调整Demo 中 config.json 公私字段的命名<br>3. 优化接口通讯安全处理 |
| v1.1.4 | 2021/12/21 | 1. 修复扫码接口地址问题 <br>2. 修复扫码支付模块支付类型对象数据格式化问题 |
| v1.1.5 | 2022/01/19 | 1. 封装微信、支付宝、云闪付商户管理模块对象；<br>2. 封装分账用户管理模块对象 |
| v1.1.6 | 2022/04/21 | 1. 封装支付宝花呗分期模块对象；<br>2. 封装终端报备模块对象；<br>3. 封装银行卡分期模块对象；<br>4. 封装交易取现、出金交易查询模块对象；<br>5. 封装智能终端模块对象；<br>6. 封装交易确认模块对象；<br>7. 升级商户管理、快捷代扣、线上交易的部分接口为V2版本； |
| v1.1.7 | 2022/05/05 | 1. 实现机构列表查询功能封装；<br>2. 实现商户关系绑定功能封装；<br>3. 实现机构下属商户查询功能封装；<br>4. 升级商户图片上传接口为V2版本； |
| v1.1.8 | 2022/05/12 | 1. 实现支付托管H5、PC、支付宝小程序、微信小程序预下单功能封装；<br>2. 补充验签工具使用说明； |
| v1.1.9 | 2022/07/14 | 1. 网银支付页面版、手机网页支付、快捷支付页面版接口只加签不验签；<br>2. 商户图片上传接口免加解签；<br>3. 优化预下单功能封装； |
| v2.0.0 | 2022/09/16 | 1. 类名按资源路径生成；<br>2. demo中字段说明更详细； |


# SDK 包结构说明

**BsPaySdk** 目录下内容为待添加到项目中的文件；

**BsPayDemo** 目录下为示例项目，供接入时参考使用；

# 使用方法
```
composer require guanhui07/dg-php-sdk:dev-master
```

composer 配置自动加载项；路径参考应用根目录下 composer.json 文件，添加如下 autoload 配置：
```
    "autoload": {
        ......
        "classmap": ["vendor/guanhui07/dg-php-sdk/BsPaySdk"]
    },

```

执行命令，使配置生效
```
composer dumpautoload
```

## json   BsPayConfig.json
```json
{
  "************* Demo演示生成环境测试商户参数 *************":"",
  "sys_id":"6666000108854952",
  "product_id":"YYZY",    
  "rsa_merch_private_key":"MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCxtfk3rjwdpBV81WBy5jIMcDLFdvHckhjGXkmWfaBn7euPRyetEhS4inpr7EvQ5KDUXNBPljI2NVhG/LEGZKvau1MW8j3t7dJ3gWafuVGsCiLJHU79sIRHf11nKOTykX5WxB/7MMwRnZsECuaZyCk7WPuSAlznqbDJdrZTzHhjQzMhjto1qD6+vc0OxyaBFlOY9piBtEfecsvD+6GfQ8exFqwzblJm9iZPYw02DaeUDLFO9Umn7i7gShlj/1Hh8nEM7YitpF/p26o+MC9LHWbIjgzjvNVhSRVmbvWys+3S11Zm/vux6Yzfk0H3fqrksAKSEkLEtEoYKS4wKjHdecztAgMBAAECggEACy1g4WmqCks5tsJM8K0d1L5x0w2qJK9js4ZWpop8Pk0ulbJqAm6ysvCyxnr0Qc0/eFvmFjtiKRqt1LksATTvwjAqB7Vww7hDlpSi+cTUKDfy/CdFwpsJlt2h6E0gKUmRYq+vO0NUcn8xMs3ktyNpxHvSRtqzMTbxEZrP2PFxWPzUKGNyk53FTlJ64YCoGQqWeGhA5LO6QLPHlAxIrvRf9B5dtXQr5XZXVqS9MwjtsRPvQPWiFXxlzvhJRcL/wXehcNextHzpMMgX/idB3HIpIl6XXLKiFUR4rBDJIMiQjQvS6zz2l1zpiJ0vWujVa3IY+PNefRA2ttg1DeC19GYa2QKBgQDh7AkJ7wut7p4qYAdcFEDVhFgP5mnSRyOBGWmClHYE4RIFplPiv4yO0fttAjFuCg4Zaxq49BuV3zshWOEIr72VK6wMa6Z+QbfXNr/1DT6nW+ktgXTw2G9Ts/nZiMrpcsbl7qvwChfJAPvEwnyP7Ckmd9t2WbQisuYZc+Vu8znO7wKBgQDJXskTiExEipQSOcVH5cX/ExVyj9MoLjmJhy3WTTDzGafgEoOPOfej2ZCgF6gCwugXJr+rtgdOpASk8WPACaCePdjdgQ2NVhSfV3op3TtvhgAPf3iI/zCVkZM4I1iZs6KjdHstLCKyAzCFBsowkPbfZBlFX4eO7Bk6XcIZ6x2h4wKBgQDcH64C5s4bb2beZOhm2Dj/kU54V4l93+CBFjCOkXaYdG+p35DWWspqEcCHSt68l8F7FLdZxEbodTPY3w+L9iejI4UkKPN1CzVD1U2dR4VnbY85zmwRiuCVzsM/KCCE61dOi4ktfbgFGhc1dEYHuROzLo8/tlFkiajW3eyLeSM3MwKBgATL3iw57d8gEeDRQXKx9WJa+QLOjDAD0dkFwEC/e+/+Z3I93qZVsiFT+E7n4VeXfuG2SZB0eH4WCApJuZ+EWzAJtxWnkkQQjdMxyTYgD99bKLs1xRA2S9j0K7aFmQGoNrJ//sMXrwfgbZJtk/lOKqMthjCR0u/DjeJHA22MnRsTAoGADXzJs/of0JExvQWwfdIUnSEPs/PgTrrJpo+CAdXnagYHF+InrmvIcNwx6ZzIs+9aGwUt0d/YsSpJkHMfAtTwZjB7sSw8Cg5DZ179Jy3YkKhFPvZv2ZCANa5J74HZNQUrUUL6O4FouZUiLwFlq8YuUPRtkAjYwyS/jwUbhJzqZhQ=",
  "rsa_huifu_public_key":"MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAkMX8p3GyMw3gk6x72h20NOk3L9+Nn9mOVP6+YoBwCe7Zs4QmYrA/etFRZw2TQrSc51wgtCkJi1/x8Wl7maPL1uH2+77JFlPv7H/F4Lr2I2LXgnllg6PtwOSw/qvGYInVVB4kL85VQl0/8ObyxBUdJ43I0z/u8hJb2gwujSudOGizbeqQXAYrwcNy+e+cjodpPy9unpJjBfa4Wz2eVLLvUYYKZKdRn6pZR2cQsMBvL30K4cFlZqlJ9iP2hTG3gaiZJ9JrjTigwki0g9pbTDXiPACfuF1nOeObvLD22zBbgn1kwgfsqoG67z7g84u2jvfUFCzX1JRgd0xfNorTRkS2RQIDAQAB"
}
```

```php
BsPay::init( '/path/to/BsPayConfig.json', false);

```

## usage 

```php
    use BsPaySdk\core\BsPayClient;
    use BsPaySdk\request\V2TradePaymentJspayRequest;

    $requestParams = new V2TradePaymentJspayRequest();
    // 请求日期
    $requestParams->setReqDate(date("Ymd"));
    // 请求流水号
//        $requestParams->setReqSeqId(date("YmdHis") . mt_rand());
    $requestParams->setReqSeqId($orderNo);
    // 商户号
    $requestParams->setHuifuId(self::HUIFU_ID);
    // 商品描述
    $requestParams->setGoodsDesc($title);
    // 交易类型 	T_JSAPI: 微信公众号
    //T_MINIAPP: 微信小程序
    //A_JSAPI: 支付宝JS
    //A_NATIVE: 支付宝正扫
    //U_NATIVE: 银联正扫
    //U_JSAPI: 银联JS
    //D_NATIVE: 数字人民币正扫
    //T_H5：微信直连H5支付
    //T_APP：微信APP支付
    //T_NATIVE：微信正扫
    $requestParams->setTradeType($tradeType);
    // 交易金额 单位元
    $requestParams->setTransAmt((string)$amount);

    // 设置非必填字段
    $extendInfoMap = $this->getExtendInfos();
    $requestParams->setExtendInfo($extendInfoMap);

    $client = new BsPayClient();
    $result = $client->postRequest($requestParams);
    if (!$result || $result->isError()) {  //失败处理
        var_dump($result->getErrorInfo());
        throw new CoreException('支付发起失败');
    }

    //成功处理
    $result = $resultObj->getRspDatas();

```



#### 2.3 完成系统参数的导入

   ```php
    # 从文件导入商户系统参数
    BsPay::init(dirname(__FILE__). '/config/config_merch_default.json', false);
    
    # sdk也支持追加多套系统参数，并可以在调用接口时进行切换，适用于下辖多商户的系统接入
    BsPay::init(dirname(__FILE__). '/config/config_merch_2.json', false, "merchantKey2");
    BsPay::init(dirname(__FILE__). '/config/config_merch_3.json', false, "merchantKey3");
    ...
   ```
   
#### 2.4 **以上内容，建议参考 SDK Demo 中 loader.php 文件内的代码写法**

### 3. SDK 调用方法（一）：使用接口 request 实例调用，以商户业务开通接口为例

#### 3.1 导入前一步实现的 SDK 初始化文件

   ```php
   # 导入初始化内容
   require_once dirname(__FILE__) . "/loader.php";
   require_once  dirname(__FILE__). "/../BsPaySdk/request/V2MerchantBusiOpenRequest.php";
   ```

#### 3.2 根据接口文档说明，创建对应请求的参数数据体

   ```php
    # 请求必填参数
    $request = new V2MerchantBusiOpenRequest();
    // 请求流水号
    $request->setReqSeqId(date("YmdHis").mt_rand());
    // 请求日期
    $request->setReqDate(date("Ymd"));
    // 汇付ID
    $request->setHuifuId("6666000104778898");
    // 渠道商汇付ID
    $request->setUpperHuifuId("6666000003080000");
    
    # 请求拓展参数 (可选)
    $extendInfoMap = getExtendInfos() ;
    $request->setExtendInfo($extendInfoMap);
   ```

#### 3.3 调用接口

   ```php
   # 创建请求Client对象，调用接口
    $client = new BsPayClient();
    $result = $client->postRequest($request);
   ```

#### 3.4 处理返回结果

   ```php
   # 成功/失败应答的处理
   if (!$result || $result->isError()){  //失败处理
       var_dump($result -> getErrorInfo());
   } else {    //成功处理
       var_dump($result);
   }
   ```

#### 3.5 **以上内容，建议参考 SDK Demo 中 V2MerchantBusiOpenRequestDemo.php 文件内的代码写法**

### 4. SDK 调用方法（二）：使用集中传参方式调用，以商户业务开通接口为例

   除基于接口 request 实例调用外，另提供一种集中传参方式，拓展适应不同需求；

#### 4.1 导入前一步实现的 SDK 初始化文件

   ```php
   # 导入初始化内容
   require_once dirname(__FILE__) . "/loader.php";
   require_once  dirname(__FILE__). "/../BsPaySdk/request/V2MerchantBusiOpenRequest.php";
   ```

#### 4.2 根据接口文档说明，创建对应请求的参数数据体

   ```php
    # 请求实例
    $request = new V2MerchantBusiOpenRequest();
    
    // 请求参数，不区分必填和可选，按照 api 文档 data 参数结构依次传入
    $param = array(
        "funcCode" => $request->getFunctionCode(),
        "params" => array(
            "req_seq_id" => date("YmdHis").mt_rand(),
            "req_date" => date("Ymd"),
            "huifu_id" => "6666000104778898",
            "upper_huifu_id" => "6666000003080000",
            "balance_pay_config" => json_encode(array(
                "fee_rate" =>"2",
                "fee_fix_amt" =>"1",
            ),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES),
        ),
    );
   ```

#### 4.3 调用接口

   ```php
   # 创建请求Client对象，调用接口
    $client = new BsPayClient();
    $result = $client->postRequest($param);
   ```

#### 4.4 处理返回结果

   ```php
   # 成功/失败应答的处理
   if (!$result || $result->isError()){  //失败处理
       var_dump($result -> getErrorInfo());
   } else {    //成功处理
       var_dump($result);
   }
   ```

### 5 验签工具（BsPayTools.php）

* 校验签名 - verifySign_sort

    （此方法为返回报文签名验签，将返回data 按字母顺序排序后组成json 字符串，依据 RSA2 算法使用公钥进行验签

    示例：
```php
$data = array(
    'bank_code' =>'10000',
    'bank_message' =>'Success',
    'hf_seq_id' =>'002900TOP2B220511142822P984ac132ff400000',
    'huifu_id' =>'6666000108854952',
    'qr_code' =>'https://qr.alipay.com/bax04465kcijedllqhuq004b',
    'req_date' =>'20220511',
    'req_seq_id' =>'202205111428211506200',
    'resp_code' =>'00000100',
    'resp_desc' =>'下单成功',
    'trade_type' =>'A_NATIVE',
    'trans_amt' =>'1.00',
    'trans_stat' =>'P',
);
$sign = "OUotiU75VW7SdEwLIZX3gAqSgZk8hCjE7r01WQr8mDdm23B+zd58r8HNWvE9BWV+mTwZ2iAOSuht9SOGM+spSYFANa3VIqMZzGim3y4aZmptQTTptNcclocsWyocn78efdAuTcGvf5dhUc6/Ue1oYV+BVhphYPmkKUKfxpEvBEvw/vlpsCu0I0Dx/k7kN6IaxY6mODypFmDtnEaZbkGaxbh8yxH1lJDn5/91YfD6vpK+sRJXiVXLzDK13BPAjQ3RAlFUxHJ8LPJbWQQpABQ94Gd1TTc/bfOluqUwJJbofC7WZiIOW6MKsa9gL5Y6lmbqFcMBKfvexJ0SlRFLWvSkQg==";
$merConfig = BsPay::getConfig();
$result = BsPayTools::verifySign_sort($sign,$data,$merConfig->rsa_huifu_public_key);
```

  * 校验 webhook 返回报文签名 - verify_webhook_sign
  
    （此方法为异步回调验签方法，将返回 data 字符串与商户配置的key 组合后进行md5计算，返回的md5值与回调sign的比较结果
  
    示例：
```php
$data = array(
    'bank_code' =>'10000',
    'bank_message' =>'Success',
    'hf_seq_id' =>'002900TOP2B220511142822P984ac132ff400000',
    'huifu_id' =>'6666000108854952',
    'qr_code' =>'https://qr.alipay.com/bax04465kcijedllqhuq004b',
    'req_date' =>'20220511',
    'req_seq_id' =>'202205111428211506200',
    'resp_code' =>'00000100',
    'resp_desc' =>'下单成功',
    'trade_type' =>'A_NATIVE',
    'trans_amt' =>'1.00',
    'trans_stat' =>'P',
);
$sign = 'dcc64089c44ea77cfde785de4cfa97ba';
$key = 'test_key';
$result = BsPayTools::verify_webhook_sign($sign,$data,$key);
```

