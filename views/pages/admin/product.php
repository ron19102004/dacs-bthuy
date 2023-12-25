<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title> ALL PRODUCTS</title>
    <link rel="stylesheet" href="../../styles/product.css">

</head>

<body>
    <?php include('menu.php') ?>
    <div id="demo">
        <h1>PRODUCTS</h1>
        <div class="table-responsive-vertical shadow-z-1">
            <table id="table" class="table table-hover table-mc-light-blue">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Delete</th>
                        <th>Fix</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['ID'])) {
                        $iddanhmuc = $_GET['ID'];
                        $conn = mysqli_connect("localhost", "root", "", "dacs");
                        if (!$conn) {
                            die("Kết nối thất bại: " . mysqli_connect_error());
                        }
                        $sql = "SELECT * FROM product WHERE id_brands = ?";
                        $stmt = mysqli_prepare($conn, $sql);
                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, "i", $iddanhmuc);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>
                            <td data-title="ID">' . $row['id_pd'] . '</td>
                            <td data-title="Name">' . $row['name_pd'] . '</td>
                            <td data-title="Price">' . $row['price_pd'] . '</td>
                            <td data-title="Quantity">' . $row['soluong'] . '</td>
                            <td data-title="Delete">
                                <a href="delete.php?IDsp=' . $row['id_pd'] . '" >Delete</a>
                            </td>
                            <td data-title="Fix">
                                <a href="suasp.php?IDsp=' . $row['id_pd'] . '" >Fix</a>
                            </td>
                            </tr>';
                            }

                            mysqli_stmt_close($stmt);
                        } else {
                            echo "Lỗi trong quá trình chuẩn bị truy vấn";
                        }

                        mysqli_close($conn);
                    } else {
                        // Xử lý khi không có tham số 'ID' được truyền
                        echo "Không có ID được truyền qua URL";
                    }

                    ?>
                </tbody>
            </table>
        </div>


    </div>


</body>

</html>
<script src="../../scripts/product.js" type="text/javascript"></script>