<?php
session_start(); // Đảm bảo session được khởi tạo ở đầu

// Lấy dữ liệu từ session
$name = $_SESSION['name'] ?? '';
$user_id = $_SESSION['user_id'] ?? '';

// Kiểm tra nếu dữ liệu chưa được lưu trong session
if (empty($name) || empty($user_id)) {
    echo "<script>
            alert('Bạn chưa nhập thông tin. Vui lòng thực hiện lại.');
            window.location.href = 'index.php';
          </script>";
    exit();
}

// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "survey_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra và lưu thông tin khảo sát vào cơ sở dữ liệu
$satisfaction = $_SESSION['step1'] ?? '';
$app_choice = $_SESSION['step2'] ?? '';
$action = $_SESSION['step3'] ?? '';
$feedback = $_SESSION['feedback'] ?? '';

// Kiểm tra dữ liệu khảo sát trước khi lưu
// if (empty($satisfaction) || empty($app_choice) || empty($action) || empty($feedback)) {
//     die("Dữ liệu khảo sát không đầy đủ. Vui lòng thực hiện khảo sát lại.");
// }

// Lưu dữ liệu vào cơ sở dữ liệu
$stmt = $conn->prepare("INSERT INTO survey_responses (user_id, name, satisfaction_rating, app_choice, action, feedback) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $user_id, $name, $satisfaction, $app_choice, $action, $feedback);

if ($stmt->execute()) {
    echo "";
} else {
    echo "Lỗi: " . $stmt->error;
}
$stmt->close();
$conn->close();

// Xóa session khảo sát sau khi lưu
session_unset();
session_destroy();
?>




<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Cảm ơn</title>

    <script type="text/javascript">
        // Khi trang được load, kiểm tra lịch sử duyệt web
        window.onload = function() {
            // Chặn người dùng quay lại trang khảo sát
            if (history.length > 1) {
                history.pushState(null, null, location.href);
                window.onpopstate = function() {
                    // Khi người dùng nhấn nút quay lại, chuyển hướng tới index.php
                    window.location.href = 'index.php';
                };
            }
        };
    </script>
</head>

<body>
    <div class="container">
        <img src="images/logo.png" alt="Logo Image" class="logo">
        <div class="info">
            <span>Cảm ơn bạn đã tham gia khảo sát, Riokupon sẽ tiếp nhận ý kiến và nâng cao trải nghiệm của khách hàng
                nhiều hơn nữa.</span>
        </div>
    </div>
</body>

</html>