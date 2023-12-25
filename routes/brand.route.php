<?php
require($_SERVER['DOCUMENT_ROOT'] . "/controllers/brand.controller.php");
require($_SERVER['DOCUMENT_ROOT'] . "/helpers/guard.php");

function auth_route()
{
    $brandController = new BrandController();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $method = htmlspecialchars($_POST['method']);
        if($method == 'add'){
            $guard = Guard::Admin();
            if($guard == false) return;
            $brandController->add();
            header('Location: ../views/pages/admin/home.php');
            return;
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $method = htmlspecialchars($_GET['method']);
        if ($method == 'get_all') {
            $data = $brandController->get_all();
            echo json_encode($data);
            return;
        }
        if($method == 'delete'){
            $guard = Guard::Admin();
            if($guard == false) return;
            $brandController->delete();
            header('Location: ../views/pages/admin/home.php');
            return;
        }
       
    }
}
auth_route();
