<?php
include '../Thanhgiaodien/header.php';
include '../database/connect.php';
?>

<?php
$sql = "SELECT product.*, type.type_name, saleoff.sale_name
        FROM product 
        INNER JOIN type ON product.type_id = type.type_id
        INNER JOIN saleoff ON product.saleoff_id = saleoff.saleoff_id";
$query = mysqli_query($conn, $sql);
if (!$query) {
    echo "Lỗi truy vấn: " . mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin sản phẩm</title>
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
            <tr>
                <td colspan="2">
                    <h1 class="h2">Thông Tin sản phẩm</h1>
                </td>

                <td colspan="2">
                    <a class="btn" href="themsp.php"><i class="fas fa-plus"></i> Thêm sản phẩm</a>
                </td>
            </tr>
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Id sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Loại Sản Phẩm</th>
                        <th>Giá Sản Phẩm</th>
                        <th>Giảm giá</th>
                        <th>Ảnh Sản Phẩm</th>
                        <th>Quản Lý</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    if (mysqli_num_rows($query) > 0) {

                        while ($row = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><?= $count++; ?></td>
                                <td><?= $row['product_id'] ?></td>
                                <td><?= $row['product_name']; ?></td>
                                <td><?= $row['type_name']; ?></td>
                                <td><?= $row['price']; ?></td>
                                <td><?= $row['sale_name']; ?></td>
                                <td><img src="../anh/<?= $row['img'] ?>" alt="Product Image" width="80" height="80"></td>

                                <td>
                                    <div class="but"></div>
                                    <button class="btn">
                                        <a href="suasp.php?id=<?= $row['product_id'] ?>"
                                            style="text-decoration:none; color:inherit;">Sửa</a>
                                    </button>

                                    <button class="btn">
                                        <a onclick="return Delete('<?= $row['product_name']; ?>')"
                                            href="xoasp.php?id=<?= $row['product_id']; ?>"
                                            style="text-decoration:none; color:inherit;">Xóa</a>
                                    </button>

                                </td>

                            </tr>
                    <?php }
                    } else {
                        echo "<tr>
                    <td colspan='7'>Không có sản phẩm nào</td>
                    </tr>";
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script>
    function Delete(name) {
        return confirm("Bạn có chắc muốn xóa sản phẩm: " + name + " không?");
    }
</script>

</html>