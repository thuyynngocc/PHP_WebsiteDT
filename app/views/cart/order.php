<?php
include_once 'app/views/share/user/header.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin đơn hàng</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-size: 28px;
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            font-weight: 500;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        input[type="checkbox"] {
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        ul {
            padding: 0;
            list-style-type: none;
            margin-bottom: 20px;
        }
        li {
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .product-info {
            display: flex;
            align-items: center;
        }
        .product-info img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
        }
        .product-details {
            flex: 1;
        }
        .product-name {
            font-size: 20px;
            color: #333;
            margin-bottom: 5px;
        }
        .product-price {
            font-size: 18px;
            color: #007bff;
            margin-bottom: 5px;
        }
        .quantity-label {
            font-size: 16px;
            color: #666;
            margin-bottom: 5px;
        }
        .total-label {
            font-size: 18px;
            color: #333;
            font-weight: 500;
            margin-top: 20px;
        }
        .total-amount {
            font-size: 24px;
            color: #007bff;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thông tin đơn hàng</h2>
        
        <form action="/dienthoai2/cart/process_order" method="post">
            <?php
            echo "<h2>Danh sách giỏ hàng</h2>";
            echo "<ul>";
            foreach ($_SESSION['cart'] as $item) {
                echo "<li class='product-info'>
                        <img src='/dienthoai2/$item->hinh' alt='$item->tenSP'>
                        <div class='product-details'>
                            <p class='product-name'>$item->tenSP</p>
                            <p class='product-price'>Giá: " . number_format($item->gia, 0, ',', '.') . "đ</p>
                            <label class='quantity-label'>Số lượng: $item->quantity</label>
                        </div>
                    </li>";
            }
            echo "</ul>";
            ?>

            <label for="fullname">Họ và Tên:</label><br>
            <input type="text" id="hoTen" name="hoTen" required><br><br>

            <label for="phone">Điện Thoại:</label><br>
            <input type="text" id="dienThoai" name="dienThoai" required><br><br>

            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" required><br><br>

            <label for="address">Địa Chỉ Nhận Hàng:</label><br>
            <textarea id="diachi" name="diachi" required></textarea><br><br>

            <label for="note">Ghi Chú:</label><br>
            <textarea id="ghichu" name="ghichu"></textarea><br><br>

            <label>Phương Thức Thanh Toán:</label><br>
            <input type="radio" id="cod" name="phuongThucThanhToan" value="cod" checked>
            <label for="cod">COD</label><br>
            <input type="radio" id="bank_transfer" name="phuongThucThanhToan" value="bank_transfer">
            <label for="bank_transfer">Chuyển khoản</label><br><br>

            <input type="checkbox" id="terms" name="terms" required>
            <label for="terms">Tôi chấp nhận điều khoản và điều kiện</label><br><br>

            <input type="submit" value="Xác Nhận Mua Hàng">
        </form>
    </div>

<?php
include_once 'app/views/share/user/footer.php';
?>
</body>
</html>
