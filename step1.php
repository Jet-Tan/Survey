<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['step1'] = $_POST['satisfaction'];
    header("Location: step2.php");
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
                <div>
                    <label>
                        😍 Rất thích
                    </label>
                    <div>
                        <input type="radio" name="satisfaction" value="Rất yêu thích" onchange="autoSubmit()">
                    </div>

                </div>

                <div>
                    <label>😊 Bình thường</label>
                    <div>
                        <input type="radio" name="satisfaction" value="Bình thường" onchange="autoSubmit()">
                    </div>

                </div>

                <div>
                    <label>😞 Không tốt</label>
                    <div>
                        <input type="radio" name="satisfaction" value="Không tốt" onchange="autoSubmit()">
                    </div>

                </div>
            </div>
        </form>
    </div>
</body>

</html>