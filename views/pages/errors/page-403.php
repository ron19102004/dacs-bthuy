<?php
require($_SERVER['DOCUMENT_ROOT'] . "/helpers/env.php");
$url = ENV::getObjectArray('url') ?? 'http://localhost:3000/';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/page-403.css">
    <title>Lỗi 403</title>
</head>

<body>
    <div class="text-wrapper">
        <div class="title" data-content="404">
            403 - KHÔNG ĐƯỢC CHẤP NHẬN
        </div>

        <div class="subtitle">
            Xin lỗi, bạn không có quyền truy cập trang này.</div>
        <div class="isi">
            Một máy chủ web có thể trả về mã trạng thái HTTP 403 Forbidden trong phản hồi đối với một yêu cầu từ phía khách hàng để hiển thị rằng máy chủ có thể được tiếp cận và hiểu yêu cầu, nhưng từ chối thực hiện bất kỳ hành động nào thêm. Các phản ứng có mã trạng thái 403 là kết quả của việc cấu hình máy chủ web từ chối quyền truy cập, vì một lý do nào đó, đối với tài nguyên được yêu cầu bởi khách hàng.
        </div>

        <div class="buttons">
            <a class="button" href="<?php echo $url; ?>">Về trang chủ</a>
        </div>
    </div>
</body>

</html>