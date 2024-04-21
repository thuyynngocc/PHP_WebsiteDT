<?php
include_once 'app/views/share/user/header.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng điện thoại chính hãng | Nhà bán lẻ giá tốt</title>
    <link rel="stylesheet" href="https://getbootstrap.com/docs/5.0/getting-started/introduction/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/dienthoai2/public/css/styles.css">
    
</head>
<body>
    <br><br>
    <main>
        <div class="dangky">
            <div class="signup-form">
                <h2>Đăng ký</h2>
                <form class="user" action="/dienthoai2/user/save" method="post">
                    <div class="form-group">
                        <label for="fullname">Họ và tên</label>
                        <input type="text" id="hoTen" name="hoTen" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <div class="password-input">
                            <input type="password" id="matKhau" name="matKhau" required>
                            <span class="toggle-password"><i class="fas fa-eye"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Xác nhận mật khẩu</label>
                        <div class="password-input">
                            <input type="password" id="confirm_password" name="confirm_password" required>
                            <span class="toggle-password"><i class="fas fa-eye"></i></span>
                        </div>
                    </div>
                    <button type="submit" class="btn-signup">Đăng ký</button>
                </form>
                <p>Bạn đã có tài khoản? <a href="./dangnhap.php">Đăng nhập</a></p>
            </div>
        </div>
    </main>
    <br><br>

    <!-- Script để ẩn hiện mật khẩu -->
    <script>
        const togglePassword = document.querySelectorAll('.toggle-password');
        togglePassword.forEach(btn => {
            btn.addEventListener('click', () => {
                const passwordInput = btn.parentElement.querySelector('input');
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                btn.querySelector('i').classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>
</html>
<?php include_once 'app/views/share/user/footer.php'; ?>