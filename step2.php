<?php
session_start();
// include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['step2_choice'] = $_POST['app_choice'];
    header('Location: step3.php');
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
    <title>Bước 2: Chọn ứng dụng</title>
    <script>
    function autoSubmit() {
        document.getElementById('step2-form').submit();
    }
    </script>
</head>

<body>
    <div class="container">
        <h2>Trải Nghiệm Mua Sắm Hoàn Tiền Tại Riokupon Của Bạn Thế Nào?</h2>
        <div class="info">
            <i class="fa-solid fa-cart-plus"></i> Bạn mua sắm qua App Riokupon hay Messenger Riokupon
        </div>
        <form id="step2-form" method="POST">
            <div class="feedback-group">
                <div>
                    <label>App
                        Riokupon</label>
                    <input type="radio" name="app_choice" value="App Riokupon" onchange="autoSubmit()">
                </div>
                <div>
                    <label> Messenger
                        Riokupon</label><input type="radio" name="app_choice" value="Messenger Riokupon"
                        onchange="autoSubmit()">
                </div>
            </div>



        </form>

    </div>

</body>

</html>