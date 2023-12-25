<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . "/services/user.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/entities/user.php");
class AuthController
{
    private $userService;
    public function __construct()
    {
        $this->userService = new UserService();
    }
    public function sign_in()
    {
        $username = htmlspecialchars($_POST['username']) ?? '';
        $password = htmlspecialchars($_POST['password']) ?? '';
        $user = $this->userService->findUserByUsername($username);
        if ($user == null) {
            return [
                "success" => false,
                "message" => "Tên người dùng sai",
                "data" => null
            ];
        }
        if ($password != $user->password) {
            return [
                "success" => false,
                "message" => "Mật khẩu sai",
                "data" => null
            ];
        }
        $_SESSION['username'] = $user->username;
        $_SESSION['role'] = $user->role;
        $_SESSION['id_user'] = $user->id_user;
        return [
            "success" => true,
            "message" => "Đăng nhập thành công",
            "data" => [
                "role" => $user->role,
                "username" => $user->username,
                'url' => ENV::getObjectArray('url')
            ]
        ];
    }
    public function register()
    {
        $username = htmlspecialchars($_POST["username"]) ?? '';
        $password = htmlspecialchars($_POST["password"]) ?? '';
        $email = htmlspecialchars($_POST["email"]) ?? '';
        $user = $this->userService->findUserByUsername($username);
        if ($user != null) {
            return [
                "success" => false,
                "message" => "Tên người dùng đã tồn tại",
                "data" => null
            ];
        }
        $user = $this->userService->create($username, $password, $email);
        return [
            "success" => true,
            "message" => "Đăng kí thành công. Vui lòng đăng nhập",
            "data" => null
        ];
    }
}
