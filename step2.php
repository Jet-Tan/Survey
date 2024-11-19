<?php
include_once "db_connect.php";

// Validate and sanitize user_id
$user_id = $_GET['user_id'] ?? '';
if (empty($user_id) || !preg_match('/^[a-zA-Z0-9]+$/', $user_id)) {
    // Invalid user_id, redirect or handle the error
    echo "Invalid user_id.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $step2 = htmlspecialchars(trim($_POST['step2']));


    $stmt = $conn->prepare("UPDATE survey_responses SET step2=? WHERE user_id=?");
    if ($stmt === false) {
        error_log("Error preparing statement: " . $conn->error);
        echo "Có lỗi xảy ra, vui lòng thử lại sau.";
        exit();
    }

    $stmt->bind_param("ss", $step2, $user_id);

    if ($stmt->execute()) {
        header("Location: step3.php?user_id=$user_id");
        exit();
    } else {
        error_log("Database Error: " . $stmt->error);
        echo "Có lỗi xảy ra, vui lòng thử lại sau.";
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
            <img src="images/tick.png" alt="Tick Image" class="tick"> Tích vào 1 ô mà bạn chọn
        </div>
        <form id="step2-form" method="POST">
            <div class="feedback-group">
                <label>App
                    Riokupon <input type="radio" name="step2" value="App Riokupon" onchange="autoSubmit()">
                </label>
                <label> Messenger
                    Riokupon <input type="radio" name="step2" value="Messenger Riokupon" onchange="autoSubmit()">
                </label>
            </div>
        </form>
    </div>

</body>

</html>