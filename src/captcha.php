<?php
session_start();

// 生成随机验证码文本
$captchaCode = generateRandomCode(6); // 生成6位数的验证码，与前端一致

// 存储验证码文本到 session，用于验证
$_SESSION['captchaCode'] = $captchaCode;

// 创建图片
$image = imagecreatetruecolor(120, 40);

// 创建颜色
$bgColor = imagecolorallocate($image, 255, 255, 255); // 白色背景
$textColor = imagecolorallocate($image, 0, 0, 0); // 黑色文字

// 填充背景色
imagefilledrectangle($image, 0, 0, 120, 40, $bgColor);

// 写入验证码文本
imagestring($image, 5, 30, 10, $captchaCode, $textColor);

// 设置响应头，输出图像
header('Content-type: image/png');
imagepng($image);

// 清理资源
imagedestroy($image);

// 生成随机验证码函数
function generateRandomCode($length) {
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $code;
}
?>
