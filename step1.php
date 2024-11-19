<?php
include_once "db_connect.php";

// Lấy `user_id` từ URL
if (
    !isset($_GET['user_id']) || empty($_GET['user_id'])
) {
    // Tạo giá trị user_id mẫu (có thể là từ session, database hoặc giá trị giả định)
    $user_id = uniqid(); // Tạo ID ngẫu nhiên nếu cần
    header("Location: step1.php?user_id=$user_id");
    exit();
} else {
    // Nếu user_id đã tồn tại, lấy giá trị từ URL
    $user_id = $_GET['user_id'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $step1 = $_POST['step1'];

    $sql = "INSERT INTO survey_responses (user_id, step1) VALUES ('$user_id', '$step1') 
            ON DUPLICATE KEY UPDATE step1='$step1'";

    if ($conn->query($sql) === TRUE) {
        header("Location: step2.php?user_id=$user_id");
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Riokupon</title>
    <script>
        // Hàm tự động gửi form khi chọn radio button
        function autoSubmit() {
            document.getElementById('step1-form').submit(); // Gửi form khi chọn radio
        }
    </script>
</head>

<body>
    <div class="container">
        <h2>Trải Nghiệm <span style="color:#000; font-size: 1.5rem;">Mua Sắm Hoàn Tiền Tại Riokupon</span> Của Bạn Thế
            Nào?
        </h2>
        <div class="info">
            <i class="fa-regular fa-face-smile-beam"></i> Cho Rio biết cảm xúc của bạn khi mua sắm hoàn tiền qua
            Riokupon
        </div>
        <form id="step1-form" method="POST">
            <div class="feedback-group">
                <label>
                    😍 Rất
                    thích<input type="radio" name="step1" value="Rất yêu thích" onchange="autoSubmit()">
                </label>
                <label>😊 Bình thường <input type="radio" name="step1" value="Bình thường" onchange="autoSubmit()">
                </label>
                <label>😞 Không tốt <input type="radio" name="step1" value="Không tốt" onchange="autoSubmit()">
                </label>
            </div>
        </form>
    </div>
</body>

</html>