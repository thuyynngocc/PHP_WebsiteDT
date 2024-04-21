<?php
include_once 'app/views/share/admin/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Tài Khoản</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Màu nền */
            color: #000000; /* Màu chữ */
        }
        .container {
            margin-top: 50px;
        }
        .card-header {
            background-color: #343a40; /* Màu header */
            color: #ffffff; /* Màu chữ header */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Chi Tiết Tài Khoản</div>
                    <div class="card-body">
                       
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email:</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" value="<?= $users->email ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="full-name" class="col-sm-4 col-form-label">Họ và Tên:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="full-name" value="<?= $users->hoTen ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="full-name" class="col-sm-4 col-form-label">Quyền:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="full-name" value="<?= $users->role ?>" readonly>
                            </div>
                        </div>
                        <!-- Thêm các trường thông tin khác ở đây -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
include_once 'app/views/share/admin/footer.php';
?>
