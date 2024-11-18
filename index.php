<?php
session_start(); // Đảm bảo session được khởi tạo

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra nếu người dùng đã điền thông tin
    if (isset($_POST['name']) && isset($_POST['user_id'])) {
        // Lưu vào session
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['user_id'] = $_POST['user_id'];

        // Kiểm tra xem user_id đã tồn tại trong cơ sở dữ liệu chưa
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM survey_responses WHERE user_id = '$user_id'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // Nếu user_id đã tồn tại, chuyển hướng đến trang cảm ơn
            header("Location: thankyou.php");
            exit();
        } else {
            header("Location: step1.php");
            $stmt->close();
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin.";
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Riokupon</title>
</head>
<style>
input {
    border-radius: 8px;
    padding: 10px
}

.feedback-group {
    margin: 10px 20px;
    background: transparent;
}
</style>

<body>
    <div class="container">
        <h2>Khảo sát về Riokupon</h2>
        <form id="step-form" method="post">
            <div class="feedback-group">

                <label for="name">Họ và tên:</label>
                <input type="text" id="name" name="name" required><br>

                <label for="user_id">Mã giới thiệu:</label>
                <input type="text" id="user_id" name="user_id" placeholder="U12345" required><br>

                <input type="hidden" name="stage" value="1">

            </div>
            <button type="submit">Tiếp tục</button>
        </form>
    </div>

</body>

</html>