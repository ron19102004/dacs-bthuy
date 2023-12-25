<?php
require($_SERVER['DOCUMENT_ROOT'] . "/services/brand.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/entities/product.php");
require($_SERVER['DOCUMENT_ROOT'] . "/entities/brand.php");
class BrandController
{
    private $brandService;
    public function __construct()
    {
        $this->brandService = new BrandService();
    }
    public function get_all()
    {
        return $this->brandService->find();
    }
    
    public function add()
    {
        $conn = mysqli_connect("localhost", "root", "", "dacs");
        $ten = htmlspecialchars($_POST['tenbr']);
        $sql = "INSERT INTO brands(name) VALUES('$ten') ";
        if ($conn->query($sql) === TRUE) {
            echo "Tên đã được thêm mới thành công vào CSDL!";
        } else {
            echo "Lỗi khi thêm tên vào CSDL: " . $conn->error;
        }
        $conn->close();
    }
    public function delete()
    {
        $conn = mysqli_connect("localhost", "root", "", "dacs");
        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }
        if (isset($_GET['ID'])) {
            $query = "DELETE FROM brands WHERE id = ?";
            $stmt = mysqli_prepare($conn, $query);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "i", $_GET['ID']);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                echo "Xóa danh mục thành công.";
            } else {
                echo "Lỗi trong quá trình chuẩn bị truy vấn.";
            }
        } else {
            echo "Không có ID được truyền qua URL.";
        }
        // Đóng kết nối
        mysqli_close($conn);
    }
}
