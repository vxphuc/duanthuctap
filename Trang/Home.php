<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../csspage/home.css">

</head>

<body>
    <?php include '../Thanhgiaodien/header.php'; ?>


    <div class="container">
        <div class="image-container">
            <img src="../anh/inf.webp" class="home-image">
        </div>

        <div class="description-container">
            <h3>Chào mừng bạn đến với shop thực phẩm rau củ sạch của chúng tôi</h3>
        </div>
    </div>
    <div class="Type">
        <h2></h2>
        <?php include '../Thanhgiaodien/sanphamnoibat.php' ?>
    </div>
    <div class="Type">
        <h2>Loại thực phẩm</h2>
        <ul class="food-list">
            <li><img src="../anh/vegetables.jpg" alt="Vegetables"><a href="">Rau củ</a></li>
            <li><img src="../anh/fruit.jpg" alt="Fruit"><a href="">Trái cây</a></li>
            <li><img src="../anh/spice.jpg" alt="Spice"><a href="">Gia Vị</a></li>
        </ul>
    </div>

    <div class="container">
        <div class="image-container">
            <img src="../anh/contact.jpg" class="home-image">
        </div>
        <div class="description-container">
            <h3>Chào mừng bạn đến với shop thực phẩm rau củ sạch của chúng tôi,với kinh nghiệm mua bán rau củ trong
                10
                năm , tận tình chăm sóc và chu đáo với khách hàng</h3>
        </div>
    </div>
</body>
<?php include '../Thanhgiaodien/tintuc.php'; ?>


<?php include '../Thanhgiaodien/footer.php'; ?>


</html>