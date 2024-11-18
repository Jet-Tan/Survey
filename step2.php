<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['step2'] = $_POST['app_choice'];
    header("Location: step3.php");
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
        function autoSubmit() {
            document.getElementById('step2-form').submit();
        }
    </script>
</head>

<body>
    <div class="container">
        <h2>Trải Nghiệm <span style="color:#000; font-size: 1.5rem;">Mua Sắm Hoàn Tiền Tại Riokupon</span> Của Bạn Thế
            Nào?
        </h2>
        <div class="info" style="color:#fff; background: rgb(182 68 59)">
            <i class="fa-solid fa-cart-shopping" style="color:#fff"></i> Bạn mua sắm qua App Riokupon hay Messenger
            Riokupon
        </div>
        <div class="check">
            <img src="images/tick.png" alt="Tick Image" class="tick"> Ý kiến của bạn rất quan trọng với Riokupon
        </div>
        <form id="step2-form" method="POST">
            <div class="feedback-group">
                <div>
                    <label>App
                        Riokupon</label>
                    <div>
                        <input type="radio" name="app_choice" value="App Riokupon" onchange="autoSubmit()">
                    </div>
                </div>
                <div>
                    <label> Messenger
                        Riokupon</label>
                    <div>
                        <input type="radio" name="app_choice" value="Messenger Riokupon" onchange="autoSubmit()">
                    </div>
                </div>
            </div>



        </form>

    </div>

</body>

</html>