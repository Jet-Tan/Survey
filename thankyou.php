


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Riokupon</title>

    <script type="text/javascript">
        // Khi trang được load, kiểm tra lịch sử duyệt web
        window.onload = function() {
            // Chặn người dùng quay lại trang khảo sát
            if (history.length > 1) {
                history.pushState(null, null, location.href);
                window.onpopstate = function() {
                    // Khi người dùng nhấn nút quay lại, chuyển hướng tới index.php
                    window.location.href = 'index.php';
                };
            }
        };
    </script>
</head>

<body>
    <div class="container">
        <img src="images/logo.png" alt="Logo Image" class="logo">
        <div class="info">
            <span>Cảm ơn bạn đã tham gia khảo sát, Riokupon sẽ tiếp nhận ý kiến và nâng cao trải nghiệm của khách hàng
                nhiều hơn nữa.</span>
        </div>
    </div>
</body>

</html>