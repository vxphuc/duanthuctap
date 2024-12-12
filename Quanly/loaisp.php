<?php
include '../Thanhgiaodien/header.php';
include '../database/connect.php';
$query = "SELECT * FROM type";
if (!$query) {
    echo "Lỗi truy vấn: " . mysqli_error($conn);
}
if (isset($_POST['add_type'])) {
    $type = $_POST['type'];
    $sql = "INSERT INTO type (type_name) VALUES ('$type')";
    $add = mysqli_query($conn, $sql);
}
$result = mysqli_query($conn, $query);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin đơn hàng</title>
    <link rel="stylesheet" href="../csspage/manage.css">
    <style>
        .form-wrapper {
            width: 220px;
            background-color: black;
            position: relative;
            left: 1000px;

        }

        .ct {
            display: flex;
            align-items: center;
        }

        .ct input.form-control {
            width: auto;
            margin-right: 10px;

        }

        .ct button {
            margin-top: 0;

        }
    </style>

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
            <div>
                <h1 class="h1">Thông Tin Đơn Hàng</h1>
                <div class="form-wrapper">
                    <form id="form" action="" method="post">
                        <div class="ct">
                            <table>
                                <tr>
                                    <td><input required type="text" class="form-control" name="type"
                                            placeholder="Loại sản phẩm"></td>
                                    <td><button type="submit" name="add_type">Thêm</button></td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
            </div>




            <div class="bang ">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Id loại sản phẩm</th>
                            <th>Tên loại sản phẩm</th>
                            <th>Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        if (mysqli_num_rows($result) > 0) {

                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $row['type_id'] ?></td>
                                    <td><?= $row['type_name'] ?></td>
                                    <td>
                                        <button class="btn">
                                            <a href="sualoaisp.php?id=<?= $row['type_id'] ?>"
                                                style="text-decoration:none; color:inherit;">Sửa</a>
                                        </button>

                                        <button class="btn">
                                            <a onclick="return Delete('<?= $row['type_name']; ?>')"
                                                href="xoaloaisp.php?id=<?= $row['type_id']; ?>"
                                                style="text-decoration:none; color:inherit;">Xóa</a>
                                        </button>
                                    </td>
                                </tr>

                        <?php }
                        } else {
                            // Nếu không có dữ liệu
                            echo "<tr>
                    <td colspan='4'>Không có sản phẩm nào</td>
                    </tr>";
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
    function Delete(name) {
        return confirm(" Bạn có chắc muốn xóa người dùng: " + name + " không?");
    }
</script>

</html>