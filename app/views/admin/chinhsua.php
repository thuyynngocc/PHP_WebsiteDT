<?php
include_once 'app/views/share/admin/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Quyền Người Dùng</title>
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
        .btn {
        background-color: #000;
        color: #fff;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Chỉnh Sửa Quyền Người Dùng</div>
                    <div class="card-body">
                        <form action="/dienthoai2/user/sua" method="post">
                        <input type="hidden" name="maID" value="<?= $users->maID ?>">
                            <div class="form-group">
                                <label for="username">Tên Đăng Nhập:</label>
                                <input type="text" class="form-control" id="username" value="<?= $users->hoTen?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="role">Quyền:</label>
                                <select class="form-control" id="role" name="role" >
                                    <?php
                                            if( $users->role == "ADMIN"){
                                              echo "<option value='ADMIN'>Admin</option>
                                              <option value='USER'>USER</option>";
                                            }else{
                                               echo "<option value='USER'>User</option>
                                               <option value='ADMIN'>Admin</option>";
                                            }
                                    ?>
                                    
                                    <!-- <option value=""></option>
                                    <option value="USER">User</option>
                                    <option value="ADMIN">Admin</option> -->
                                </select>
                            </div>
                            <button type="submit" class="btn ">Lưu</button>
                        </form>
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
