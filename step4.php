<?php
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: step1.php");
//     exit();
// }

include_once "db_connect.php";

$user_id = $_GET['user_id'] ?? '';
if (empty($user_id) || !preg_match('/^[a-zA-Z0-9]+$/', $user_id)) {
    // Invalid user_id, redirect or handle the error
    echo "Invalid user_id.";
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback = htmlspecialchars(trim($_POST['feedback']));

    $sql = "UPDATE survey_responses SET feedback='$feedback' WHERE user_id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: thankyou.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
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

<body>
    <div class="container">

        <h2>Trải Nghiệm <span style="color:#000; font-size: 1.5rem;">Mua Sắm Hoàn Tiền Tại Riokupon</span> Của Bạn Thế
            Nào?
        </h2>
        <div class="info" style="color:#fff; background: rgb(182 68 59)">
            <img src="images/mail.png" alt="Mail Image"> Bạn thấy khó khăn ở bước nào khi mua sắm qua Riokupon
        </div>
        <div class="check">
            <img src="images/tick.png" alt="Tick Image" class="tick"> Ý kiến của bạn rất quan trọng với Riokupon
        </div>
        <form method="post">
            <textarea id="feedback" name="feedback" rows="4" cols="50" placeholder="Nhập ý kiến của bạn..."
                required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>

</body>

</html>