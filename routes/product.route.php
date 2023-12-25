<?php
require($_SERVER['DOCUMENT_ROOT'] . "/controllers/product.controller.php");
require($_SERVER['DOCUMENT_ROOT'] . "/helpers/guard.php");
function auth_route()
{
    $productController = new ProductController();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $method = htmlspecialchars($_POST['method']);
        if($method == 'add'){
            $guard = Guard::Admin();
            if($guard == false) return;
            $productController->add();
            header('Location: ../views/pages/admin/themsp.php');
            return;
        }
        if($method == 'update'){
            $guard = Guard::Admin();
            if($guard == false) return;
            $productController->update();
            header('Location: ../views/pages/admin/suasp.php');
            return;
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $method = htmlspecialchars($_GET['method']);
        if ($method == 'get_all') {
            $data = $productController->get_all();
            echo json_encode($data);
            return;
        }
        if ($method == 'get_by_id') {
            $data = $productController->get_by_id();
            echo json_encode($data);
            return;
        }
        if ($method == 'delete') {
            $guard = Guard::Admin();
            if($guard == false) return;
            $productController->delete();
            header('Location: ../views/pages/admin/home.php');
            return;
        }
    }
}
auth_route();
