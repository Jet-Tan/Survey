<?php
include_once "db_connect.php";

// Use session to store user ID
session_start();

// Get `user_id` from session or URL
if (!isset($_GET['user_id']) || empty($_GET['user_id'])) {
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['user_id'] = uniqid(); // Generate a random ID if needed
    }
    header("Location: step1.php?user_id=" . $_SESSION['user_id']);
    exit();
} else {
    // If user_id exists, set it in session
    $_SESSION['user_id'] = $_GET['user_id'];
    $user_id = $_SESSION['user_id'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $step1 = htmlspecialchars(trim($_POST['step1']));

    // Check if user_id already exists in the database
    $stmt = $conn->prepare("SELECT 1 FROM survey_responses WHERE user_id = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If user_id exists, update the record
        $update_stmt = $conn->prepare("UPDATE survey_responses SET step1 = ? WHERE user_id = ?");
        $update_stmt->bind_param("ss", $step1, $user_id);
        if ($update_stmt->execute()) {
            header("Location: step2.php?user_id=$user_id");
            exit();
        } else {
            error_log("Database Error: " . $update_stmt->error);
            echo "Có lỗi xảy ra, vui lòng thử lại sau.";
        }
    } else {
        // If user_id doesn't exist, insert a new record
        $insert_stmt = $conn->prepare("INSERT INTO survey_responses (user_id, step1) VALUES (?, ?)");
        $insert_stmt->bind_param("ss", $user_id, $step1);
        if ($insert_stmt->execute()) {
            header("Location: step2.php?user_id=$user_id");
            exit();
        } else {
            error_log("Database Error: " . $insert_stmt->error);
            echo "Có lỗi xảy ra, vui lòng thử lại sau.";
        }
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