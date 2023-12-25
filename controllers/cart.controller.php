<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . "/services/cart.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/services/product.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/entities/user.php");
require($_SERVER['DOCUMENT_ROOT'] . "/entities/product.php");
require($_SERVER['DOCUMENT_ROOT'] . "/entities/cart.php");
class CartController
{
    private $cartService;
    private $productService;
    public function __construct()
    {
        $this->cartService = new CartService();
        $this->productService = new ProductService();
    }
    public function get_count_cart()
    {
        $id_user =  $_SESSION['id_user'] ?? 0;
        if ($id_user == 0) {
            return [
                "success" => false,
                "message" => "Chưa đăng nhập",
                "data" => 0
            ];
        }
        $count = $this->cartService->count_cart_by_id_user($id_user);
        return [
            "success" => true,
            "message" => "Lấy số lượng thành công",
            "data" => $count
        ];
    }
    public function add()
    {
        $data = [
            'ID_user' => $_SESSION['id_user'] ?? 0,
            'ID_sp' => htmlspecialchars($_POST['ID_sp']) ?? 0,
            'soluong' => htmlspecialchars($_POST['soluong']) ?? 0
        ];
        if ($data['ID_user'] == 0) {
            return [
                "success" => false,
                "message" => "Vui lòng đăng nhập",
                "data" => null
            ];
        }
        $cart_check = $this->cartService->findByIdUserAndIdProduct($data['ID_user'], $data['ID_sp']);
        $product = $this->productService->findByID($data['ID_sp']);
        if ($cart_check != null) {
            $soluong_moi =  $cart_check->soluong +  $data['soluong'];
            $gia_moi =  $product->price_pd * $soluong_moi;
            $this->cartService->updateSoluongAndGia($cart_check->id, $soluong_moi, $gia_moi);
            return [
                "success" => true,
                "message" => "Đã thêm",
                "data" => null
            ];
        }
        $gia = (int)  $data['ID_sp'] * (int) $product->price_pd;
        $this->cartService->save($data['ID_user'], $data['ID_sp'], $data['soluong'], $gia);
        return [
            "success" => true,
            "message" => "Đã thêm",
            "data" => null
        ];
    }
}
