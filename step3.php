<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['step3'] = $_POST['action'];
    header("Location: step4.php");
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
        <h2>Trải Nghiệm <span style="color:#000; font-size: 1.5rem;">Mua Sắm Hoàn Tiền Tại Riokupon</span> Của Bạn Thế
            Nào?
        </h2>
        <div class="info">
            <img src="images/store.png" alt="Store Image">Bạn thấy khó khăn ở bước nào khi mua sắm qua Riokupon
        </div>
        <div class="check">
            <img src="images/tick.png" alt="Tick Image" class="tick"> Ý kiến của bạn rất quan trọng với Riokupon
        </div>
        <form id="step3-form" method="POST">
            <div class="feedback-group">
                <div>
                    <label>Tải app Riokupon</label>
                    <div>
                        <input type="radio" name="action" value="Tải app Riokupon" onchange="autoSubmit()">
                    </div>

                </div>
                <div>
                    <label>
                        Đăng nhập tài khoản Riokupon</label>
                    <div>
                        <input type="radio" name="action" value="Đăng nhập tài khoản Riokupon" onchange="autoSubmit()">
                    </div>
                </div>
                <div>
                    <label> Copy link sản phẩm trên sàn</label>
                    <div>
                        <input type="radio" name="action" value="Tải app Riokupon" onchange="autoSubmit()">
                    </div>
                </div>
                <div>
                    <label>
                        Dán link sản phẩm ở messenger/app Riokupon</label>
                    <div>
                        <input type="radio" name="action" value="Đăng nhập tài khoản Riokupon" onchange="autoSubmit()">
                    </div>
                </div>
                <div>
                    <label> Không có gì khó khăn</label>
                    <div>
                        <input type="radio" name="action" value="Tải app Riokupon" onchange="autoSubmit()">
                    </div>
                </div>

            </div>
        </form>
    </div>

</body>

</html>