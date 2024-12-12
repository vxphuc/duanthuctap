<?php
session_start();
require_once '../database/connect.php';
include '../Thanhgiaodien/header.php';

// Hiển thị lỗi
error_reporting(E_ALL);
ini_set('display_errors', 1);

$customer_name = '';
$username = '';
$password = '';
$gmail = '';
$re_pass = '';
$error_message = [];
$message_success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $customer_name = trim($_POST['customer_name']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $re_pass = $_POST['re_pass'];
    $gmail = trim($_POST['gmail']);

    if (strlen($username) < 6 || strlen($username) > 50) {
        $error_message[] = 'Nhập tên lớn hơn 6 kí tự và nhỏ hơn 50 kí tự';
    }
    if (!filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
        $error_message[] = "Email không hợp lệ";
    }
    if (strlen($password) < 6) {
        $error_message[] = 'Mật khẩu phải lớn hơn 6 kí tự';
    }
    if ($password != $re_pass) {
        $error_message[] = 'Mật khẩu không khớp';
    }

    // Kiểm tra username
    $check_username = $conn->prepare("SELECT * FROM customer WHERE username = ?");
    $check_username->bind_param("s", $username);
    $check_username->execute();
    if ($check_username->get_result()->num_rows > 0) {
        $error_message[] = 'Tên đăng nhập đã tồn tại.';
    }

    // Kiểm tra email
    $check_gmail = $conn->prepare("SELECT * FROM customer WHERE gmail = ?");
    $check_gmail->bind_param("s", $gmail);
    $check_gmail->execute();
    if ($check_gmail->get_result()->num_rows > 0) {
        $error_message[] = 'Email đã tồn tại.';
    }

    if (empty($error_message)) {
        $stmt = $conn->prepare("INSERT INTO customer (customer_name, username, password, gmail, role_id) VALUES (?, ?, ?, ?, 1)");
        if (!$stmt) {
            die("Chuẩn bị câu lệnh thất bại: " . $conn->error);
        }
        $stmt->bind_param("ssss", $customer_name, $username, $password, $gmail);
        if ($stmt->execute()) {
            $message_success = 'Đăng ký thành công! Vui lòng đăng nhập.';
            header("Location: ../Trang/login.php");
            exit();
        } else {
            $error_message[] = 'Đăng ký thất bại. Vui lòng thử lại.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="..//csspage/signup.css">
</head>


<body>

    <div class="container">
        <h2>Đăng ký</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="customer_name">Tên người dùng</label>
                <input value="<?= $customer_name ?>" type="text" id="customer_name" name="customer_name" required>
            </div>
            <div class="form-group">
                <label for="username">Tên đăng nhập</label>
                <input value="<?= $username ?>" type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input value="<?= $password ?>" type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="re_pass">Nhập lại mật khẩu</label>
                <input value="<?= $re_pass ?>" type="password" id="re_pass" name="re_pass" required>
            </div>
            <div class="form-group">
                <label for="gmail">Email</label>
                <input value="<?= $gmail ?>" type="email" id="gmail" name="gmail" required>
            </div>
            <div class="row">
                <div class="form-group">
                    <a href="../Trang/login.php">Đã có tài khoản rồi</a>
                </div>
                <div class="form-group">
                    <a href="../Trang/home.php">Trang chủ</a>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="signup" value="Đăng kí"></a>
            </div>
            <?php if (!empty($error_message)): ?>
                <ul style="color: red;">
                    <?php foreach ($error_message as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </form>
    </div>
</body>


</html>
<?php include '../Thanhgiaodien/footer.php'; ?>