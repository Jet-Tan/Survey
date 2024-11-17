<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['feedback'] = $_POST['feedback'];
    header("Location: thankyou.php");
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
    <title>Bước 4: Nhận xét</title>
</head>

<body>
    <div class="container">

        <h2>Trải Nghiệm Mua Sắm Hoàn Tiền Tại Riokupon Của Bạn Thế Nào?</h2>
        <div class="info">
            <img src="images/mail.png" alt="Mail Image"> Bạn thấy khó khăn ở bước nào khi mua sắm qua Riokupon
        </div>
        <div class="check">
            <img src="images/tick.png" alt="Tick Image" class="tick"> Ý kiến của bạn rất quan trọng với Riokupon
        </div>
        <form method="post" action="step4.php">

            <textarea id="feedback" name="feedback" rows="4" cols="50" placeholder="Nhập ý kiến của bạn..."
                required></textarea>



            <button type="submit">Submit</button>
        </form>
    </div>

</body>

</html>