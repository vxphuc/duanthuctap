<?php
include '../Thanhgiaodien/header.php';
include '../database/connect.php';
?>
<!DOCTYPE html>
<html lang="vi">
<?php
$sql1 = "SELECT *
          FROM `oder`
          JOIN customer ON `oder`.customer_id = customer.customer_id
          JOIN status ON `oder`.status_id = status.status_id";
$query = mysqli_query($conn, $sql1);
if (!$query) {
    echo "Lỗi truy vấn: " . mysqli_error($conn);
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin đơn hàng</title>
    <link rel="stylesheet" href="../csspage/manage.css">

</head>

<body>
    <div class="container">

        <div class="sidebar">
            <h2>Quản Lý</h2>
            <ul>
                <li><a href="../Quanly/nguoidung.php">Quản lý người dùng</a></li>
                <li><a href="../Quanly/nhanvien.php">Quản lý nhân viên</a></li>
                <li><a href="../Quanly/sanpham.php">Quản lý sản phẩm</a></li>
                <li><a href="../Quanly/donhang.php">Quản lý đơn hàng</a></li>
                <li><a href="../Quanly/loaisp.php">Quản lý loại sản phẩm</a></li>
                <li><a href="../Quanly/giamgia.php">Quản lý giảm giá</a></li>
            </ul>
        </div>

        <div class="main-content">
            <h1 class="h1">Thông Tin Đơn Hàng</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id khách hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ giao</th>
                        <th>Tình trạng</th>
                        <th>Quản lý đơn hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($query) > 0) {

                        while ($row = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><?= $row['customer_id'] ?></td>
                                <td><?= $row['customer_name'] ?></td>
                                <td><?= $row['oder_id'] ?></td>
                                <td><?= $row['oder_date'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['address'] ?></td>
                                <td><?= $row['status_name'] ?></td>
                                <td>
                                    <div class="but"></div>
                                    <button class="btn">Sửa</button>
                                    <button class="btn">Xóa</button>
                                </td>
                            </tr>

                    <?php }
                    } else {
                        // Nếu không có dữ liệu
                        echo "<tr>
                    <td colspan='7'>Không có sản phẩm nào</td>
                    </tr>";
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>