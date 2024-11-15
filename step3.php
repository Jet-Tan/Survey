<?php
session_start();
// include 'db_connection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['step3_choice'] = $_POST['action_choice'];

    // Lấy dữ liệu từ session
    $step1 = $_SESSION['step1_choice'];
    $step2 = $_SESSION['step2_choice'];
    $step3 = $_POST['action_choice'];

    // Lưu vào cơ sở dữ liệu
    $sql = "INSERT INTO multi_step_survey (step1_choice, step2_choice, step3_choice)
            VALUES ('$step1', '$step2', '$step3')";

    if ($conn->query($sql) === TRUE) {
        echo "Cảm ơn bạn đã hoàn thành khảo sát!";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    session_destroy();
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
    <title>Bước 3: Hành động tiếp theo</title>
    <script>
    function autoSubmit() {
        document.getElementById('step3-form').submit();
    }
    </script>
</head>

<body>
    <div class="container">
        <h2>Trải Nghiệm Mua Sắm Hoàn Tiền Tại Riokupon Của Bạn Thế Nào?</h2>
        <div class="info">
            <i class="fa-solid fa-store"></i> Bạn thấy khó khăn ở bước nào khi mua sắm qua Riokupon
        </div>
        <form id="step3-form" method="POST">
            <div class="feedback-group">
                <div>
                    <label>Tải
                        app
                        Riokupon</label>
                    <input type="radio" name="action_choice" value="Tải app Riokupon" onchange="autoSubmit()">
                </div>
                <div>
                    <label>
                        Đăng nhập tài khoản Riokupon</label>
                    <input type="radio" name="action_choice" value="Đăng nhập tài khoản Riokupon"
                        onchange="autoSubmit()">
                </div>
                <div>
                    <label> Copy link sản phẩm trên sàn</label>
                    <input type="radio" name="action_choice" value="Tải app Riokupon" onchange="autoSubmit()">
                </div>
                <div>
                    <label>
                        Dán link sản phẩm ở messenger/app Riokupon</label>
                    <input type="radio" name="action_choice" value="Đăng nhập tài khoản Riokupon"
                        onchange="autoSubmit()">
                </div>
                <div>
                    <label> Không có gì khó khăn</label>
                    <input type="radio" name="action_choice" value="Tải app Riokupon" onchange="autoSubmit()">
                </div>

            </div>
        </form>
    </div>

</body>

</html>