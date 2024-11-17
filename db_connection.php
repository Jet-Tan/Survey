<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "survey_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$spl = "CREATE TABLE survey_responses (
    id INT AUTO_INCREMENT PRIMARY KEY,    -- ID tự động tăng
    satisfaction_rating VARCHAR(50),       -- Mức độ hài lòng
    app_choice VARCHAR(100),               -- Lựa chọn ứng dụng (App Riokupon, Messenger Riokupon)
    action VARCHAR(100),                  -- Hành động tiếp theo (Tải app, Đăng nhập tài khoản)
    feedback TEXT,                         -- Ý kiến đóng góp
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Thời gian gửi khảo sát
)";

if ($conn->query($spl) === TRUE) {  // Sửa đây từ $sql thành $spl
    echo "Table survey_responses created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
