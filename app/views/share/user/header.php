<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/dienthoai2/public/css/styles.css">
</head>
<body>
<header>
    <div class="container">
        <!-- Phần logo -->
        <div class="logo">
            <a href="/dienthoai2/product/trangChu"><img src="/dienthoai2/app/views/share/img/logo3.png"></a>
        </div>

        <!-- Phần menu -->
        <nav>
            <ul>
                <li class="dropbtn"><a href="/dienthoai2/product/listSP">Sản Phẩm</a>   
                    <ul class="top-menu-item">
                        <div class="dropdown-content">
                            <!-- Dữ liệu menu sẽ được đặt ở đây -->
                        </div>
                    </ul>
                </li>
                <li><a href="/dienthoai2/product/tintuc">Tin tức</a></li>
                <li><a href="/dienthoai2/product/gioithieu">Giới Thiệu</a></li>
                <li><a href="/dienthoai2/cart/show">Giỏ Hàng</a></li>
            </ul>
        </nav>

        <!-- Phần tìm kiếm  -->
        <div class="header-icons">
            <form action="/dienthoai2/product/listLocSP" method="POST" class="search-form">
                <input type="text" placeholder="Nhập sản phẩm cần tìm" name="tenSP" id="tenSP">
                <button name="timkiem" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <!-- Phần đăng nhập và đăng ký -->
        <div class="user-auth">
        
            <?php if(isset($_SESSION['email'])) { ?>
                <a href=""><?php echo $_SESSION['email'] ?> </a>
                <span>|</span>
                <a href="/dienthoai2/user/logout">Đăng Xuất</a>
            <?php } else { ?>
                <a href="/dienthoai2/app/views/account/dangky.php">Đăng Ký</a>
                <span>|</span>
                <a href="/dienthoai2/app/views/account/dangnhap.php">Đăng Nhập</a>
            <?php } ?>
        </div>
    </div>
</header>

</body>
</html>