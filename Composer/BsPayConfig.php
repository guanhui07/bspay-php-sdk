<?php

use BsPaySdk\core\BsPay;

# 以下配置为开发联调时覆盖SDK的配置项，需在引入SDK的init.php之前配置以覆盖SDK初始配置
# 设置是否调试模式，不配置默认关闭：false
if (!defined("DEBUG")) {
    define("DEBUG", true);
}


# init方法，从 config.json 加载系统参数
BsPay::init(__DIR__ .'/BsPayConfig.json', false);

