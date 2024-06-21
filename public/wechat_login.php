<?php
require '../src/ThirdPartyLoginController.php';

use MySdk\ThirdPartyLoginController;

// 获取微信的access token
$accessToken = $_GET['access_token'];

$thirdPartyLoginController = new ThirdPartyLoginController();
$result = $thirdPartyLoginController->loginWithWeChat($accessToken);

echo json_encode($result);
?>
