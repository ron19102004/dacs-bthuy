<?php
require($_SERVER['DOCUMENT_ROOT'] . "/controllers/user.controller.php");
require($_SERVER['DOCUMENT_ROOT'] . "/helpers/guard.php");
function auth_route()
{
    $userController = new UserController();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $method = htmlspecialchars($_POST['method']);
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $method = htmlspecialchars($_GET['method']);
        if ($method == 'get_info') {
            $data = $userController->get_info();
            echo json_encode($data);
            return;
        }
        if ($method == 'delete') {
            $guard = Guard::Admin();
            if($guard == false) return;
            $userController->delete();
            header('Location: ../views/pages/admin/user.php');
            return;
        }
    }
}
auth_route();
