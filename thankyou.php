<?php
session_start();

// Kiểm tra sự tồn tại của các giá trị session
$satisfaction = isset($_SESSION['step1']) ? $_SESSION['step1'] : '';
$app_choice = isset($_SESSION['step2']) ? $_SESSION['step2'] : '';
$action = isset($_SESSION['step3']) ? $_SESSION['step3'] : '';
$feedback = isset($_SESSION['feedback']) ? $_SESSION['feedback'] : '';

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

// Câu lệnh SQL để lưu dữ liệu vào bảng survey_responses
$sql = "INSERT INTO survey_responses (satisfaction_rating, app_choice, action, feedback)
        VALUES ('$satisfaction', '$app_choice', '$action', '$feedback')";

if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();

// Xóa session
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