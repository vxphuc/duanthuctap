<?php include '../Thanhgiaodien/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>giỏ hàng</title>
    <link rel="stylesheet" href="../csspage/shopping.css">
</head>

<body>
    <div class="container">
        <h2>Danh Sách Mua Sắm</h2>
        <table>
            <thead>
                <tr>
                    <th>Ảnh Sản Phẩm </th>
                    <th>Tên Sản Phẩm
                    </th>
                    <th>Loại</th>
                    <th>Giá Thành</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="" class="product-image"></td>
                    <td>rau cải</td>
                    <td>rau</td>
                    <td>200.000đ</td>
                </tr>
                <tr>
                    <td><img src="" class="product-image"></td>
                    <td>chúi</td>
                    <td>trái cây</td>
                    <td>150.000đ</td>
                </tr>

            </tbody>

        </table>
        <table>

        </table>

        <div class="checkout-form">
            <form action="thongbao.php" method="POST">
                <table>
                    <tr>
                        <td>
                            <div>
                                <label for="address">Địa Chỉ Nhận Hàng</label><br><input type="text" id="address"
                                    required placeholder="Nhập địa chỉ của bạn..."><br>
                            </div>
                        </td>
                        <td>
                            <div>
                                <label for="address">Số Điện Thoại</label><br><input type="text" id="phonenumber    "
                                    required placeholder="số điện thoại nhận hàng của bạn"><br>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tổng giá trị đơn hàng: <span id="total-price">0</span> VNĐ
                        </td>
                        <td>
                            <button type="submit" class="checkout-button">Xác nhận mua</button>
                        </td>

                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>
<?php include '../Thanhgiaodien/footer.php'; ?>