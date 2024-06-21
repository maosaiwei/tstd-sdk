<?php
require '../src/MySdk.php';
require '../src/LoginController.php';
require '../src/ThirdPartyLoginController.php';

use MySdk\MySdk;

$apiUrl = 'http://sdk.online-game.com/';
$sdk = new MySdk($apiUrl);
    return $sdk->getLoginUrl();
//echo "Login URL: " . $sdk->getLoginUrl() . "\n";
//echo "QQ Login URL: " . $sdk->getQQLoginUrl() . "\n";
//echo "WeChat Login URL: " . $sdk->getWeChatLoginUrl() . "\n";

// 示例登录调用
$result = $sdk->login('username', 'password');
print_r($result);

// 示例注册调用
$result = $sdk->register('username', 'password', 'email@example.com');
print_r($result);

// 示例QQ登录调用
$result = $sdk->loginWithQQ('example_access_token');
print_r($result);

// 示例微信登录调用
$result = $sdk->loginWithWeChat('example_access_token');
print_r($result);
?>