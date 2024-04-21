<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng điện thoại chính hãng | Nhà bán lẻ giá tốt</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/dienthoai2/public/css/styles.css">
    <style>
        /* CSS cho giỏ hàng */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        main {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 800px;
        }
        .cart-title {
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
            color: #007bff;
        }
        .empty-cart-message {
            font-size: 18px;
            color: #555;
            text-align: center;
        }
        .cart-item {
            display: flex;
            margin-bottom: 30px;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
            transition: all 0.3s ease;
        }
        .cart-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .item-image {
            flex: 0 0 120px;
            margin-right: 20px;
            overflow: hidden;
            border-radius: 8px;
        }
        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .item-details {
            flex: 1;
        }
        .item-name {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333;
        }
        .item-price {
            font-size: 18px;
            color: #007bff;
            margin-bottom: 10px;
        }
        .item-actions {
            display: flex;
            align-items: center;
        }
        .quantity-input {
            width: 60px;
            padding: 5px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn-update, .btn-remove {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-update:hover, .btn-remove:hover {
            background-color: #0056b3;
        }
        .btn-remove {
            background-color: #dc3545;
            margin-right: 5px;
        }
        .btn-remove:hover {
            background-color: #c82333;
        }
        .btn-icon {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <main>
        <h2 class="cart-title">Giỏ hàng của bạn</h2>
        
        <?php
        $TongTien = 0;
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "<div class='empty-cart-message'>Giỏ hàng trống!</div>";
        } else {
            foreach ($_SESSION['cart'] as $item) {
                $TongTien += $item->gia * $item->quantity;
                echo "
                <div class='cart-item'>
                    <div class='item-image'>";
                if (empty($item->hinh) || !file_exists($item->hinh)) {
                    echo "No Image!";
                } else {
                    echo "<img class='product__image' src='/dienthoai2/" . $item->hinh . "' alt='' />";
                }
                echo "</div>
                    <div class='item-details'>
                        <h3 class='item-name'>" . $item->tenSP . "</h3>
                        <p class='item-price'>Giá: " . number_format($item->gia, 0, ',', '.') . "đ</p>
                    </div>
                    <div class='item-actions'>
                        <form method='post' action='/dienthoai2/cart/updateQuality/$item->maSP'>
                            <input type='number' class='quantity-input' name='quality' value='" . $item->quantity . "' min='1'>
                            <button type='submit' class='btn-update'><i class='fas fa-sync-alt btn-icon'></i> Cập nhật</button>
                        </form>
                        <form method='post' action='/dienthoai2/cart/delete/$item->maSP'>
                            <button type='submit' class='btn-remove'><i class='fas fa-trash btn-icon'></i> Xóa</button>
                        </form>
                    </div>
                </div>
                ";
            }
            if (!empty($_SESSION['cart'])) {
                echo "<div class='cart-total'>
                    <h3>Tổng cộng: " . number_format($TongTien, 0, ',', '.') . "đ</h3>
                    <form action='/dienthoai2/cart/checkout' method='post'>
                        <button type='submit' class='btn btn-checkout'>Thanh toán</button>
                    </form>
                </div>";
            }
        }
        ?>
    </main>
</body>
</html>
