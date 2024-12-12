<?php
include '../database/connect.php';
include '../Thanhgiaodien/header.php';

$rowsPerPage = 9;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $rowsPerPage;

// Tính tổng số sản phẩm
$sql_total_products = "SELECT COUNT(*) as total FROM product";
$result_total_products = mysqli_query($conn, $sql_total_products);
$row_total_products = mysqli_fetch_assoc($result_total_products);
$totalProducts = $row_total_products['total'];

// Tính số trang tối đa
$maxPage = ceil($totalProducts / $rowsPerPage);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <link rel="stylesheet" href="../csspage/shop.css">
</head>

<body>
    <div class="shop">
        <div class="listtype">
            <h1>Phân loại</h1>
            <ul class="type-list">
                <?php
                $sql_type = "SELECT * FROM type";
                $result_type = mysqli_query($conn, $sql_type);

                if (mysqli_num_rows($result_type) > 0) {
                    while ($row = mysqli_fetch_assoc($result_type)) {
                        $type_id = $row['type_id'];
                        $type_name = $row['type_name'];
                        echo "<li><a href='#' data-type-id='{$type_id}' class='filter-type'>{$type_name}</a></li>";
                    }
                }
                ?>
            </ul>
            <h1>Giá thành</h1>
            <ul class="price-list">
                <li><a href="#" data-sort="asc" class="filter-price">Thấp đến cao</a></li>
                <li><a href="#" data-sort="desc" class="filter-price">Cao đến thấp</a></li>
                <li><a href="#" data-filter="below_1000000" class="filter-price">Dưới 1.000.000đ</a></li>
                <li><a href="#" data-filter="1000000_2000000" class="filter-price">Từ 1.000.000đ đến 2.000.000đ</a></li>
                <li><a href="#" data-filter="above_2000000" class="filter-price">Trên 2.000.000đ</a></li>
            </ul>
        </div>
        <div class="dsSanpham">
            <div class="item" id="product-list">
                <?php
                $sql = "SELECT * FROM product LIMIT $offset, $rowsPerPage";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($product = mysqli_fetch_assoc($result)) {
                        $product_name = $product['product_name'];
                        $price = number_format($product['price']);
                        $img = $product['img'];
                        echo "
            <div class='image'>
                <img src='../anh/{$img}' alt='{$product_name}'>
                <div class='text'>
                    <p class='name'>{$product_name}</p>
                    <p class='price'>Giá: {$price} VND</p>
                </div>
            </div>";
                    }
                }
                ?>
            </div>
            <div class="page">
                <?php
                echo '<div style="text-align: center; margin-top: 20px;">';

                // Nút quay lại
                if ($page > 1) {
                    echo "<a class='pagination-border' href=" . $_SERVER['PHP_SELF'] . "?page=" . ($page - 1) . "><</a> ";
                }

                // Các liên kết trang
                for ($i = 1; $i <= $maxPage; $i++) {
                    if ($i == $page) {
                        echo '<b class="pagination-border"> ' . $i . '</b> ';
                    } else {
                        echo "<a class='pagination-border' href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . ">" . $i . "</a> ";
                    }
                }

                // Nút tiếp theo
                if ($page < $maxPage) {
                    echo "<a class='pagination-border' href=" . $_SERVER['PHP_SELF'] . "?page=" . ($page + 1) . ">></a>";
                }

                echo '</div>';
                ?>
            </div>
        </div>
    </div>
    <!-- Phân trang đặt dưới danh sách sản phẩm -->

</body>
<?php include '../Thanhgiaodien/footer.php'; ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterTypeLinks = document.querySelectorAll('.filter-type');
        const filterPriceLinks = document.querySelectorAll('.filter-price');
        const productList = document.getElementById('product-list');

        function updateProducts(urlParams) {
            fetch(`filter_products.php?${urlParams}`)
                .then(response => response.text())
                .then(data => {
                    productList.innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        }

        filterTypeLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const typeId = this.getAttribute('data-type-id');
                updateProducts(`type_id=${typeId}`);
            });
        });

        filterPriceLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const sort = this.getAttribute('data-sort');
                const filter = this.getAttribute('data-filter');
                if (sort) {
                    updateProducts(`sort=${sort}`);
                } else if (filter) {
                    updateProducts(`filter=${filter}`);
                }
            });
        });
    });
</script>

</html>