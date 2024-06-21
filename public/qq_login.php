<?php
require '../src/ThirdPartyLoginController.php';

use MySdk\ThirdPartyLoginController;

// 获取QQ的access token
$accessToken = $_GET['access_token'];

$thirdPartyLoginController = new ThirdPartyLoginController();
$result = $thirdPartyLoginController->loginWithQQ($accessToken);

echo json_encode($result);
?>
