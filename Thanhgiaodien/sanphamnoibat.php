<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Featured Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .sanphamnoibat {
            padding: 20px;
            text-align: center;
        }

        .sanphamnoibat h2 {
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 30px;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .sp {
            width: 22%;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            text-align: center;
            background-color: #f9f9f9;
        }

        .image1 {
            padding-top: 10px;
            width: 300px;
            height: 300px;
            overflow: hidden;
            margin: 0 auto;
        }

        .image1 img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .text {
            padding: 10px;
            background-color: #fff;
            font-size: 14px;
        }

        .text .name {
            font-weight: bold;
            margin: 10px 0;
        }

        .button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            font-size: 14px;
            margin-top: 15px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 1200px) {
            .sp {
                width: 48%;
            }
        }

        @media (max-width: 768px) {
            .sp {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="sanphamnoibat">
        <h2>Sản phẩm nổi bật</h2>
        <div class="product-container">
            <div class="sp">
                <div class="image1">
                    <img src="../anh/vegetables.jpg" alt="">
                </div>
                <div class="text">
                    <p class="name">Tên sản phẩm</p>
                    <p class="name">Giá: 1.000.000</p>
                    <button class="button">Mua Ngay</button>
                    <button class="button">Thêm vào Giỏ hàng</button>
                </div>
            </div>
            <div class="sp">
                <div class="image1">
                    <img src="../anh/vegetables.jpg" alt="">
                </div>
                <div class="text">
                    <p class="name">Tên sản phẩm</p>
                    <p class="name">Giá: 1.000.000</p>
                    <button class="button">Mua Ngay</button>
                    <button class="button">Thêm vào Giỏ hàng</button>
                </div>
            </div>
            <div class="sp">
                <div class="image1">
                    <img src="../anh/vegetables.jpg" alt="">
                </div>
                <div class="text">
                    <p class="name">Tên sản phẩm</p>
                    <p class="name">Giá: 1.000.000</p>
                    <button class="button">Mua Ngay</button>
                    <button class="button">Thêm vào Giỏ hàng</button>
                </div>
            </div>
            <div class="sp">
                <div class="image1">
                    <img src="../anh/vegetables.jpg" alt="">
                </div>
                <div class="text">
                    <p class="name">Tên sản phẩm</p>
                    <p class="name">Giá: 1.000.000</p>
                    <button class="button">Mua Ngay</button>
                    <button class="button">Thêm vào Giỏ hàng</button>
                </div>
            </div>
            <div class="sp">
                <div class="image1">
                    <img src="../anh/vegetables.jpg" alt="">
                </div>
                <div class="text">
                    <p class="name">Tên sản phẩm</p>
                    <p class="name">Giá: 1.000.000</p>
                    <button class="button">Mua Ngay</button>
                    <button class="button">Thêm vào Giỏ hàng</button>
                </div>
            </div>

        </div>
    </div>
</body>

</html>