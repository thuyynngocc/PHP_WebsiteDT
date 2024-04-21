<?php
include_once 'app/views/share/admin/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Đơn Hàng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS styles */
        
        .table-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Quản Lý Đơn Hàng</h2>
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Khách Hàng</th>
                        <!-- <th>Tổng Tiền</th> -->
                        <th>Trạng Thái</th>
                        <th>Khách Hàng</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = $donhangs->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= $row['maDH'] ?></td>
                        <td><?= $row['ngayTao'] ?></td>
                        <td><?= $row['hoTen'] ?></td>
                        <?php
                            if($row['trangThai'] == '1'){
                                echo "<td>Đang chuẩn bị</td>";
                            }else if($row['trangThai'] == '2'){
                                echo "<td>Đang giao</td>";
                            }
                            else if($row['trangThai'] == '3'){
                                echo "<td>Đã giao</td>";
                            }
                            else{
                                echo "<td>Đã hủy</td>";
                            }
                        ?>
                        <!-- <td></td> -->
                        <td><?= $row['ghiChu'] ?></td>
                        <td>
    <a href="/dienthoai2/donhang/chitiet/<?= $row['maDH'] ?>" class="btn btn-info btn-sm">Xem Chi Tiết</a>
    <a href="/dienthoai2/donhang/suatrangThaiDonHang/<?= $row['maDH']?>" class="btn btn-warning btn-sm"> Sửa Trạng thái</a>
   
</td>



                    </tr>
                    <?php endwhile; ?>
                    <!-- Thêm các hàng khác ở đây -->
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
include_once 'app/views/share/admin/footer.php';
?>
