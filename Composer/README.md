# composer 支持

## 文件介绍

```
BsPayConfig.json   # 商户参数，包含 product_id 、公私钥等

BsPayConfig.php    # SDK初始配置项，主要作用是覆盖默认常量

README.md   # 使用说明
```

## 使用说明

以 laravel >= 5.0.0 版本为例：

1 .  composer 安装  guanhui07/dg-php-sdk

```
composer require guanhui07/dg-php-sdk:dev-master
```



2 .  composer 配置自动加载项；路径参考应用根目录下 composer.json 文件，添加如下 autoload 配置：
```
    "autoload": {
        ......
        "classmap": ["vendor/guanhui07/dg-php-sdk/BsPaySdk"]
    },

```

3 .  执行命令，使配置生效
```
composer dumpautoload
```

4 .  引用方法；以 V2MerchantActivityAddRequest 为例，使用 composer 方式不需要重复使用 require_once 资源，
直接使用命名空间方式引入即可；

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

## 更多方法使用
    
    请参考对应 demo
