<?php
require '../src/LoginController.php';

use MySdk\LoginController;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $loginController = new LoginController();
    $result = $loginController->login($username, $password);

    echo json_encode($result);
}
?>
