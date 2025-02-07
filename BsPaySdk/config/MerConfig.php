<?php

namespace BsPaySdk\config;

class MerConfig
{

    /**
     * @var string 商户rsa私钥，用来进行对斗拱接口调用的请求数据加签
     */
    public $rsa_merch_private_key = "";

    /**
     * @var string 商户汇付rsa公钥，用来进行对斗拱接口应答数据的验签，以及部分请求数据非对称加密
     */
    public $rsa_huifu_public_key = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAmC0WyHZv3rDMM8lF4JCFry3kGqdO4XvzqGYTLo5bavxOu04F7vMugs+A/3aBzV84foWlNPjU5b2v+/U9La+izZduATGmGfHRbxX06i9l0rbw+GM4AHmhxSh+5U51lNO0a0uLvy1TkVv969LItSYeGeKAhooyUNuVgjLMHr13eBE7Ws6H1Bp5CWXqroeRYm6T5nJG+cqIy6ZjaK9aElvjJhmBrByACGtXx4Rslegzr+8KehnfAzft++fyc6ElcwuX+X1J75gZHKOGMFE7SlzSQz27mOixKxbflFj5m/wOKbXYCZACyUM0t0kBK1ggWhqmD/sWmqpFjU4fX05Ca5wTSwIDAQAB';

    public $product_id = 'PAYUN';

    public $sys_id = '6666000160289731';

    public $huifu_id = '';

    public $sdk_version = 'php#v2.0.14';
}