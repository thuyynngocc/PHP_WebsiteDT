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
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Danh mục sản phẩm
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <form action="/dienthoai2/product/listLocLoaiSP" method="POST">
                                <button class="dropdown-item" value="1" name="maLoai" type="submit">Điện thoại di động</button>
                            </form>
                            <form action="/dienthoai2/product/listLocLoaiSP" method="POST">
                                <button class="dropdown-item" value="2" name="maLoai" type="submit">Máy tính | Macbook </button>
                            </form>
                            <form action="/dienthoai2/product/listLocLoaiSP" method="POST">
                                <button class="dropdown-item" value="3" name="maLoai" type="submit">Đồng hồ thông minh</button>
                            </form>
                            <!-- Thêm các danh mục sản phẩm khác tương tự ở đây -->
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row product-container">
                <?php while ($row = $products->fetch(PDO::FETCH_ASSOC)) : ?>
                    <div class="col-md-4">
                        <div class="product">
                            <?php if (empty($row['hinh']) || !file_exists($row['hinh'])) : ?>
                                <p>No Image!</p>
                            <?php else : ?>
                                <img class="product__image" src="/dienthoai2/<?= $row['hinh'] ?>" alt="" />
                            <?php endif; ?>
                            <div class="product__info">
                                <h2 class="product__name"><?= $row['tenSP'] ?></h2>
                                <p class="product__description"><?= $row['chitiet'] ?></p>
                                <p class="product__price"><?= number_format($row['gia'], 0, ",", ".") ?> VNĐ</p>
                                <button class="product__button"><a href="/dienthoai2/product/chitiet/<?= $row['maSP'] ?>">Mua ngay</a></button>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php include_once 'app/views/share/user/footer.php'; ?>
