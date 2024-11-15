<?php
session_start();

// Kiểm tra nếu form được submit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['satisfaction'])) {
    $_SESSION['step1_choice'] = $_POST['satisfaction']; // Lưu lựa chọn vào session
    header('Location: step2.php'); // Chuyển hướng tới trang tiếp theo
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Bước 1: Đánh giá</title>
    <script>
        // Hàm tự động gửi form khi chọn radio button
        function autoSubmit() {
            document.getElementById('step1-form').submit(); // Gửi form khi chọn radio
        }
    </script>
</head>

<body>
    <div class="container">
        <h2>Trải Nghiệm Mua Sắm Hoàn Tiền Tại Riokupon Của Bạn Thế Nào?</h2>
        <div class="info">
            <i class="fa-regular fa-face-smile-beam"></i> Cho Rio biết cảm xúc của bạn khi mua sắm hoàn tiền qua
            Riokupon
        </div>
        <form id="step1-form" method="POST">
            <div class="feedback-group">
                <div>
                    <label>
                        😍 Rất thích
                    </label>

                    <input type="radio" name="satisfaction" value="Rất yêu thích" onchange="autoSubmit()">

                </div>

                <div>
                    <label>😊 Bình thường</label>

                    <input type="radio" name="satisfaction" value="Bình thường" onchange="autoSubmit()">

                </div>

                <div>
                    <label>😞 Không tốt</label>

                    <input type="radio" name="satisfaction" value="Không tốt" onchange="autoSubmit()">

                </div>
            </div>
        </form>
    </div>
</body>

</html>