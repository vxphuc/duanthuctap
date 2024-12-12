<?php
session_start();
require_once '../database/connect.php';
include '../Thanhgiaodien/header.php';
$username = '';
$error_message = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Kiểm tra tài khoản
    $stmt = $conn->prepare("SELECT * FROM customer WHERE username = ?");
    if (!$stmt) {
        die("Query chuẩn bị thất bại: " . $conn->error);
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $error_message[] = 'Tài khoản không tồn tại.';
    } else {
        $account = $result->fetch_assoc();

        // So sánh mật khẩu trực tiếp
        if ($password === $account['password']) {
            $_SESSION['user'] = $account['username'];
            $_SESSION['role_id'] = $account['role_id'];
            if ($account['role_id'] == 2) {
                header("location: ../Quanly/sanpham.php");
            } else {
                header("Location: Home.php");
            }
            exit();
        } else {
            $error_message[] = 'Mật khẩu không đúng.';
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
    <link rel="stylesheet" href="../csspage/login.css">
</head>


<body>

    <div class="container">
        <h2>Đăng nhập</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Tên người dùng</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" required>
            </div>
            <div class="row">
                <div class="form-group">
                    <a href="../Trang/signup.php">Đăng ký</a>
                </div>
                <div class="form-group">
                    <a href="../Trang/home.php">Trang chủ</a>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="login" value="Đăng nhập">
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