<?php include_once 'header.php'; ?>

<!DOCTYPE html>
<html lang="vi">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng điện thoại chính hãng | Nhà bán lẻ giá tốt</title>
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/dienthoai2/public/css/styles.css">
    <style>
        .slides img {
            max-width: 100%; /* Đặt kích thước tối đa là 100% của phần tử cha */
            height: auto; /* Đảm bảo tỷ lệ khung hình bị giữ nguyên */
        }
    </style>
</head>

<body>
    <main>
        <div class="slideshow-container">
        <div class="slides fade">
                <img src="/dienthoai2/app/views/share/img/qc4.png" alt="Bộ sưu tập 1">
            </div>
            <div class="slides fade">
                <img src="/dienthoai2/app/views/share/img/qc2.png" alt="Bộ sưu tập 2">
            </div>
            <div class="slides fade">
                <img src="/dienthoai2/app/views/share/img/qc3.png" alt="Bộ sưu tập 3">
            </div>
            <!-- Thêm các slides khác tương tự ở đây -->
            
            <!-- Nút điều hướng -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
        <br>
        <br>
       
        <h2 class="news-title"><i class="fas fa-newspaper"></i> Tin tức mới</h2>

        <div class="news-container">
            <div class="news-item">
                <a href="https://www.apple.com/vn/shop/buy-iphone/iphone-15-pro"> <!-- Thay đổi đường dẫn tới trang chi tiết tin tức -->
                    <img src="/dienthoai2/app/views/share/img/news1.jpg" alt="Tin tức 1">
                    <div class="news-content">
                        <h3>Titan | IPHONE 15 PRO</h3>
                        <p>Từ 28.999.000đ hoặc 1.181.000đ/tháng trong 24 tháng</p>
                    </div>
                </a>
            </div>
            <div class="news-item">
                <a href="https://www.apple.com/vn/shop/buy-mac/macbook-air/13-inch-m3"> <!-- Thay đổi đường dẫn tới trang chi tiết tin tức -->
                    <img src="/dienthoai2/app/views/share/img/news2.jpg" alt="Tin tức 2">
                    <div class="news-content">
                        <h3>Thiết kế để đi muôn nơi</h3>
                        <p>Từ 24.999.000đ hoặc 1.018.000đ/tháng trong 24 tháng</p>
                    </div>
                </a>
            </div>
            <div class="news-item">
                <a href="https://www.apple.com/vn/shop/buy-watch/apple-watch"> <!-- Thay đổi đường dẫn tới trang chi tiết tin tức -->
                    <img src="/dienthoai2/app/views/share/img/news3.jpg" alt="Tin tức 3">
                    <div class="news-content">
                        <h3>Thông minh hơn. Sáng hơn. Quyền năng hơn</h3>
                        <p>Từ 10.499.000đ hoặc 427.000đ/tháng trong 24 tháng</p>
                    </div>
                </a>
            </div>
        </div>
       
       
        <!-- Container to display selected news content -->
        <div id="news-content" class="news-content">
            <h2 id="news-title"></h2>
            <p id="news-description"></p>
        </div>
    </main>

   

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("slides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 3000); // Đổi hình sau mỗi 2 giây
        }

        
    </script>
</body>
</html>
<?php include_once 'footer.php'; ?>


