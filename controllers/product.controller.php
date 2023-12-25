<?php
require($_SERVER['DOCUMENT_ROOT'] . "/services/product.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/entities/product.php");
require($_SERVER['DOCUMENT_ROOT'] . "/entities/brand.php");
class ProductController
{
    private $productService;
    public function __construct()
    {
        $this->productService = new ProductService();
    }
    public function get_all()
    {
        $byBrandId = $this->get_product_by_id_brand();
        if ($byBrandId['success'] == true) return $byBrandId['data'];
        $get_by_two_price = $this->get_by_two_price();
        if ($get_by_two_price['success'] == true) return $get_by_two_price['data'];
        return $this->productService->find();
    }
    public function get_product_by_id_brand()
    {
        if (isset($_GET['id_brand']) == null) {
            return [
                "success" => false,
                "message" => "Không có id ",
                "data" => null
            ];
        }
        $id_brand = htmlspecialchars($_GET['id_brand']) ?? 0;
        $product = $this->productService->findProductByIdBrand($id_brand);
        return [
            "success" => true,
            "message" => "Lấy thành công",
            "data" => $product
        ];
    }
    public function get_by_id()
    {
        $id_pd = htmlspecialchars($_GET['id_pd']) ?? 0;
        if ($id_pd == 0) {
            return [
                "success" => false,
                "message" => "Vui lòng thêm id product",
                "data" => null
            ];
        }
        $product = $this->productService->findByID($id_pd);
        return [
            "success" => true,
            "message" => "Lấy thành công",
            "data" => $product->get_product()
        ];
    }
    public function get_by_two_price()
    {
        if (isset($_GET['price_from']) == null || isset($_GET['price_to']) == null) {
            return [
                "success" => false,
                "message" => "Vui lòng thêm dữ liệu",
                "data" => null
            ];
        }
        $price_from = htmlspecialchars($_GET['price_from']) ?? 0;
        $price_to = htmlspecialchars($_GET['price_to']) ?? 0;
        $product = $this->productService->findByTwoPrice($price_from, $price_to);
        return [
            "success" => true,
            "message" => "Lấy thành công",
            "data" => $product
        ];
    }
    public function add()
    {
        $conn = mysqli_connect("localhost", "root", "", "dacs");

        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }
        $tensp = htmlspecialchars($_POST['tensp']);
        $gia = htmlspecialchars($_POST['gia']);
        $soluong = htmlspecialchars($_POST['soluong']);
        $iddanhmuc = htmlspecialchars($_POST['iddanhmuc']);
        $mota = htmlspecialchars($_POST['mota']);
        $chitiet = htmlspecialchars($_POST['chitiet']);
        $target_file = "../views/assets/" . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (file_exists($target_file)) {
            echo "Tệp đã tồn tại.";
            $uploadOk = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Tệp quá lớn.";
            $uploadOk = 0;
        }
        if (!in_array($imageFileType, array("jpg", "png", "jpeg", "gif"))) {
            echo "Chỉ được phép tải lên các tệp ảnh.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Tệp của bạn không được tải lên.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $path = "views/assets/" . $_FILES["fileToUpload"]["name"];
                $sql = "INSERT INTO product(name_pd, price_pd, mota, img, chitiet, soluong, id_brands) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $sql);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "sisssii", $tensp, $gia, $mota, $path, $chitiet, $soluong, $iddanhmuc);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    echo "Sản phẩm đã được thêm thành công.";
                } else {
                    echo "Lỗi trong quá trình chuẩn bị truy vấn";
                }
            } else {
                echo "Đã xảy ra lỗi khi tải lên tệp.";
            }
        }
        mysqli_close($conn);
    }
    public function update()
    {
        session_start();
        if (!isset($_SESSION['id_sp'])) {
            die("Yêu cầu không hợp lệ.");
        }
        $conn = mysqli_connect("localhost", "root", "", "dacs");

        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }
        $id_sp =  $_SESSION['id_sp'];
        $tensp = htmlspecialchars($_POST['tensp']);
        $gia = htmlspecialchars($_POST['gia']);
        $soluong = htmlspecialchars($_POST['soluong']);
        $iddanhmuc = htmlspecialchars($_POST['iddanhmuc']);
        $mota = htmlspecialchars($_POST['mota']);
        $chitiet = htmlspecialchars($_POST['chitiet']);
        $target_file = "../views/assets/" . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (file_exists($target_file)) {
            echo "Tệp đã tồn tại.";
            $uploadOk = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Tệp quá lớn.";
            $uploadOk = 0;
        }
        if (!in_array($imageFileType, array("jpg", "png", "jpeg", "gif"))) {
            echo "Chỉ được phép tải lên các tệp ảnh.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Tệp của bạn không được tải lên.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $path = "views/assets/" . $_FILES["fileToUpload"]["name"];
                $sql = "UPDATE product SET name_pd=?, price_pd=?, mota=?, chitiet=?, soluong=?, id_brands=?, img=? WHERE id_pd=?";
                $stmt = mysqli_prepare($conn, $sql);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "sissiisi", $tensp, $gia, $mota, $chitiet, $soluong, $iddanhmuc, $path, $id_sp);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    echo "Sản phẩm đã được cập nhật thành công.";
                } else {
                    echo "Lỗi trong quá trình chuẩn bị truy vấn";
                }
            } else {
                echo "Đã xảy ra lỗi khi tải lên tệp.";
            }
        }
        mysqli_close($conn);
    }
    public function delete()
    {
        $conn = mysqli_connect("localhost", "root", "", "dacs");
        // Kiểm tra kết nối
        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }
        // Kiểm tra xem có tham số 'ID' được truyền qua URL không
        if (isset($_GET['IDsp'])) {
            // Sử dụng prepared statements để xóa sản phẩm
            $query = "DELETE FROM product WHERE id_pd = ?";
            $stmt = mysqli_prepare($conn, $query);

            // Kiểm tra xem câu lệnh prepared có được chuẩn bị thành công không
            if ($stmt) {
                // Gán giá trị cho tham số ID
                mysqli_stmt_bind_param($stmt, "i", $_GET['IDsp']);

                // Thực thi câu lệnh prepared
                mysqli_stmt_execute($stmt);

                // Đóng câu lệnh prepared
                mysqli_stmt_close($stmt);

                echo "Xóa sản phẩm thành công.";
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
