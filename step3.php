<?php
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: step1.php");
//     exit();
// }

include_once "db_connect.php";

$user_id = $_GET['user_id'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $step3 = $_POST['step3'];

    $sql = "UPDATE survey_responses SET step3='$step3' WHERE user_id='$user_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: step4.php?user_id=$user_id");
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
    function autoSubmit() {
        document.getElementById('step3-form').submit();
    }
    </script>
</head>

<body>
    <div class="container">
        <h2>Trải Nghiệm <span style="color:#000; font-size: 1.5rem;">Mua Sắm Hoàn Tiền Tại Riokupon</span> Của Bạn Thế
            Nào?
        </h2>
        <div class="info">
            <img src="images/store.png" alt="Store Image">Bạn thấy khó khăn ở bước nào khi mua sắm qua Riokupon
        </div>
        <div class="check">
            <img src="images/tick.png" alt="Tick Image" class="tick"> Tích vào 1 ô mà bạn chọn
        </div>
        <form id="step3-form" method="POST">
            <div class="feedback-group">
                <label>Tải app Riokupon <input type="radio" name="step3" value="Tải app Riokupon"
                        onchange="autoSubmit()">
                </label>
                <label>
                    Đăng nhập tài khoản Riokupon <input type="radio" name="step3" value="Đăng nhập tài khoản Riokupon"
                        onchange="autoSubmit()">
                </label>
                <label> Copy link sản phẩm trên sàn <input type="radio" name="step3" value="Tải app Riokupon"
                        onchange="autoSubmit()">
                </label>
                <label>
                    Dán link sản phẩm ở messenger/app Riokupon <input type="radio" name="step3"
                        value="Đăng nhập tài khoản Riokupon" onchange="autoSubmit()">
                </label>
                <label> Không có gì khó khăn <input type="radio" name="step3" value="Tải app Riokupon"
                        onchange="autoSubmit()">
                </label>
            </div>
        </form>
    </div>

</body>

</html>