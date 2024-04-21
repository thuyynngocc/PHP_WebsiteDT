<?php
include_once 'app/views/share/user/header.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng điện thoại chính hãng | Nhà bán lẻ giá tốt</title>
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* CSS cho trang chi tiết sản phẩm */
/* CSS cho trang chi tiết sản phẩm */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 900px; /* Giảm kích thước container để phù hợp với màn hình desktop */
    margin: 0 auto; /* Để căn giữa nội dung trên màn hình desktop */
    padding: 20px;
}

.product-detail {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.product__image {
    width: 100%; /* Sử dụng 100% chiều rộng để hình ảnh hiển thị rộng hơn */
    height: auto;
    border-radius: 5px;
    margin-bottom: 20px;
}

h2 {
    font-size: 28px; /* Giảm kích thước tiêu đề */
    margin-bottom: 15px; /* Giảm khoảng cách giữa tiêu đề và mô tả sản phẩm */
    color: #333;
}

.description {
    font-size: 16px; /* Giảm kích thước mô tả sản phẩm */
    line-height: 1.6;
    margin-bottom: 20px; /* Giảm khoảng cách giữa mô tả sản phẩm và giá */
}

.price {
    font-size: 20px; /* Giảm kích thước giá */
    font-weight: bold;
    color: #DD5746;
    margin-bottom: 20px; /* Giảm khoảng cách giữa giá và nút mua hàng */
}

.btn-buy {
    font-size: 18px; /* Giảm kích thước nút mua hàng */
    margin-bottom: 10px;
    color: #fff;
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    display: inline-block; /* Hiển thị nút mua hàng trên cùng một dòng với giá */
}

.btn-buy:hover {
    background-color: #0056b3;
}

.specifications,
.promotions,
.reviews,
.related-products,
.share-buttons {
    margin-top: 30px;
}

.specifications h3,
.promotions h3,
.reviews h3,
.related-products h3,
.share-buttons h3 {
    font-size: 18px; /* Giảm kích thước tiêu đề phụ */
    margin-bottom: 15px;
    color: #333;
}

.specifications ul,
.promotions ul,
.related-products ul,
.share-buttons ul {
    list-style-type: none;
    padding: 0;
}

.specifications ul li,
.promotions ul li,
.related-products ul li,
.share-buttons ul li {
    font-size: 14px; /* Giảm kích thước nội dung chi tiết */
    margin-bottom: 8px;
}

.social-buttons button {
    font-size: 16px; /* Giảm kích thước nút chia sẻ */
    margin-right: 10px;
    margin-bottom: 10px;
    color: #fff;
    background-color: #007bff;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
}

.social-buttons button:hover {
    background-color: #0056b3;
}


    </style>
</head>

<body>
    <main>
        <div class="container">
            <div class="product-detail">
                <?php
                if (empty($sanPham->hinh) || !file_exists($sanPham->hinh)) {
                    echo "No Image!";
                } else {
                    echo "<img class='product__image' src='/dienthoai2/" . $sanPham->hinh . "' alt='' />";
                }
                ?>
                <h2><?= $sanPham->tenSP ?></h2>
                <p class="description"><?= $sanPham->chitiet ?></p>
                <p class="price"><?= number_format($sanPham->gia, 0, ',', '.') ?> VNĐ</p>
                <button class="btn-buy"><a href="/dienthoai2/cart/add/<?= $sanPham->maSP ?>">Mua ngay</a></button>

                <!-- Thông số kỹ thuật -->
                <div class="specifications">
    <h3>Thông số kỹ thuật</h3>
    <ul>
        <li><strong>Dung lượng pin:</strong> <?= $sanPham->pin ?></li>
        <li><strong>Kích thước màn hình:</strong> <?= $sanPham->manHinh ?></li>
        <li><strong>Camera:</strong> <?= $sanPham->camera ?></li>
        <li><strong>Bộ nhớ trong:</strong> <?= $sanPham->boNho ?></li>
        <li><strong>Hệ điều hành:</strong> <?= $sanPham->heDieuHanh ?></li>
        <li><strong>RAM:</strong> <?= $sanPham->ram ?></li>
        <li><strong>Chipset:</strong> <?= $sanPham->chipset ?></li>
    </ul>
</div>

<div class="reviews">
    <h3>Đánh giá và nhận xét</h3>
    <form action="/dienthoai2/review/add" method="post">
        <textarea name="comment" placeholder="Nhận xét của bạn"></textarea>
        <input type="submit" value="Gửi nhận xét" class="btn-submit">
    </form>
    <div class="review-list">
        <?php
        $sample_reviews = array(
            array("user" => "Nguyễn Văn A", "comment" => "Tôi đã mua sản phẩm này cách đây một tháng và tôi rất hài lòng với hiệu suất và chất lượng của nó. Camera chụp ảnh rất sắc nét và pin cũng rất bền. Tôi chắc chắn sẽ giới thiệu cho bạn bè của mình."),
            array("user" => "Trần Thị B", "comment" => "Sản phẩm này đáng giá tiền bạc. Thiết kế đẹp mắt, màn hình rộng và sắc nét. Tôi đã sử dụng nó để làm việc và giải trí và tôi cảm thấy rất hài lòng với trải nghiệm của mình.")
        );

        if (!empty($sample_reviews)) {
            foreach ($sample_reviews as $review) {
                echo '<div class="review-item">';
                echo '<p class="user">' . $review["user"] . '</p>';
                echo '<p class="comment">' . $review["comment"] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p class="no-review">Chưa có đánh giá nào cho sản phẩm này.</p>';
        }
        ?>
    </div>
</div>




<!-- Nút chia sẻ -->
<div class="share-buttons">
    <h3>Chia sẻ sản phẩm</h3>
    <div class="social-buttons">
        <!-- Thêm các nút chia sẻ -->
        <button><i class="fab fa-facebook"></i> Chia sẻ trên Facebook</button>
        <button><i class="fab fa-twitter"></i> Chia sẻ trên Twitter</button>
        <button><i class="fab fa-instagram"></i> Chia sẻ trên Instagram</button>
    </div>
</div>

            </div>
        </div>
    </main>
</body>
</html>
<?php
include_once 'app/views/share/user/footer.php';
?>
