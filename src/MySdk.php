<?php
class MySdk {
    private $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    public function loginWithUsernameAndPassword($username, $password) {
        // 登录逻辑
        // 示例：发送POST请求到服务器进行登录
        $data = [
            'username' => $username,
            'password' => $password,
        ];
        return $this->post('/login', $data);
    }

    public function loginWithCaptcha($phone, $captcha) {
        // 验证码登录逻辑
        // 示例：发送POST请求到服务器进行登录
        $data = [
            'phone' => $phone,
            'captcha' => $captcha,
        ];
        return $this->post('/login_captcha', $data);
    }

    private function post($endpoint, $data) {
        $url = $this->apiUrl . $endpoint;
        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ],
        ];
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }
}
?>
