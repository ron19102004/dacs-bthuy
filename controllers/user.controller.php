<?php
require($_SERVER['DOCUMENT_ROOT'] . "/services/user.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/entities/user.php");
class UserController
{
    private $userService;
    public function __construct()
    {
        $this->userService = new UserService();
    }
    public function get_info()
    {
        $username = $_SESSION['username'] ?? null;
        if ($username == null) {
            return [
                "success" => false,
                "message" => "Người dùng chưa đăng nhập.",
                "data" => null
            ];
        }
        $user = $this->userService->findUserByUsername($username);
        if ($user == null) {
            return [
                "success" => false,
                "message" => "Không có dữ liệu.",
                "data" => null
            ];
        }
        return [
            "success" => true,
            "message" => "Lấy dữ liệu thành công",
            "data" => $user->get_user()
        ];
    }
    public function delete()
    {
        $conn = mysqli_connect("localhost", "root", "", "dacs");
        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }
        if (isset($_GET['ID'])) {
            $query = "DELETE FROM users WHERE id_user = ?";
            $stmt = mysqli_prepare($conn, $query);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "i", htmlspecialchars($_GET['ID']));
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                echo "Xóa người dùng thành công.";
            } else {
                echo "Lỗi trong quá trình chuẩn bị truy vấn.";
            }
        } else {
            echo "Không có ID được truyền qua URL.";
        }
        mysqli_close($conn);
    }
}
