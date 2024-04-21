<?php
include_once 'app/views/share/admin/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đơn Hàng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS styles */
        
        .order-details-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Chi Tiết Đơn Hàng</h2>
        <div class="order-details-container">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Thông Tin Đơn Hàng</h4>
                </div>
                <div class="card-body">
                    <p><strong>Mã Đơn Hàng:</strong> <?= $donhang->maDH ?></p>
                    <p><strong>Ngày Đặt Hàng:</strong> <?= $donhang->ngayTao ?></p>
                    <p><strong>Khách Hàng:</strong> <?= $donhang->hoTen ?></p>
                    <p><strong>Tổng Tiền:</strong><?= $chitiet->total ?></p>
                    <?php
                            if($donhang->trangThai == '1'){
                                echo "<p><strong>Trạng Thái:</strong>Đang chuẩn bị</p>";
                            }else if($donhang->trangThai == '2'){
                                echo "<p><strong>Trạng Thái:</strong>Đang giao</p>";
                            }
                            else{
                                echo "<p><strong>Trạng Thái:</strong>Đã giao</p>";
                            }
                        ?>
                    
                    <!-- Thêm thông tin khác về đơn hàng nếu cần -->
                </div>
            </div>
            <!-- Thêm các chi tiết đơn hàng khác ở đây -->
        </div>
    </div>
</body>
</html>

<?php
include_once 'app/views/share/admin/footer.php';
?>
