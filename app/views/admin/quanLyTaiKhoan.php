<?php
include_once 'app/views/share/admin/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Tài Khoản</title>
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
        <h2 class="text-center mb-4">Quản Lý Tài Khoản</h2>
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Họ Tên</th>
                        <th>Email</th>
                        <th>Quyền</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = $users->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td><?= $row['hoTen'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['role'] ?></td>
                        <td>
                            <a href="/dienthoai2/user/chiTiet/<?= $row['maID'] ?>" class="btn btn-info btn-sm">Xem Chi Tiết</a>
                            <a href="/dienthoai2/user/chinhSua/<?= $row['maID'] ?>" class="btn btn-warning btn-sm">Chỉnh Sửa</a>
                         
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
