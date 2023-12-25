<?php
require($_SERVER['DOCUMENT_ROOT'] . "/controllers/cart.controller.php");
function auth_route()
{
    $cartController = new CartController();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $method = htmlspecialchars($_POST['method']);
        if($method == 'add_to_cart'){
            $resp = $cartController->add();
            echo json_encode($resp);
            return;
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $method = htmlspecialchars($_GET['method']);
        if ($method == 'count_total_product') {
            $resp = $cartController->get_count_cart();
            echo json_encode($resp);
            return;
        }
    }
}
auth_route();
