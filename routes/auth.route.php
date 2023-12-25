<?php
require($_SERVER['DOCUMENT_ROOT'] . "/controllers/auth.controller.php");
function auth_route()
{
    $authController = new AuthController();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $method = htmlspecialchars($_POST['method']);
        if ($method == 'sign_in') {
            $resp = $authController->sign_in();
            echo json_encode($resp);
            return;
        }
        if ($method == 'sign_up') {
            $resp = $authController->register();
            echo json_encode($resp);
            return;
        }
    }
}
auth_route();
