<?php
include_once 'app/views/share/admin/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Trạng Thái Đơn Hàng</title>
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
        .btn-primary {
            color: #fff;
            background-color: #000; /* Màu nút primary */
            border-color: #fff; /* Màu viền nút primary */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Màu hover nút primary */
            border-color: #0056b3; /* Màu viền hover nút primary */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Cập Nhật Trạng Thái Đơn Hàng</div>
                    <div class="card-body">
                        <form action="/dienthoai2/donhang/sua" method="POST">
                        <input type="hidden" name="maDH" value="<?= $donhang->maDH ?>">
                            <div class="form-group">
                                <label for="status">Trạng thái mới:</label>
                                <select class="form-control" id="trangThai" name="trangThai">
                                <?php
                                            if( $donhang->trangThai == "1"){
                                              echo "<option value='1'>Đang chuẩn bị</option>
                                              <option value='2'>Đang giao</option>
                                              <option value='3'>Đã giao</option>
                                              <option value='4'>Đã hủy</option>";
                                              
                                            }else if($donhang->trangThai == "2"){
                                               echo "
                                               <option value='2'>Đang giao</option>
                                               <option value='1'>Đang chuẩn bị</option>
                                               <option value='3'>Đã giao</option>
                                               <option value='4'>Đã hủy</option>";
                                            }else if($donhang->trangThai == "3"){
                                                echo "
                                                <option value='3'>Đã giao</option>
                                                <option value='1'>Đang chuẩn bị</option>
                                                <option value='2'>Đang giao</option>
                                                <option value='4'>Đã hủy</option>";
                                            }else{
                                                echo "
                                                <option value='4'>Đã hủy</option>
                                                <option value='1'>Đang chuẩn bị</option>
                                                <option value='2'>Đang giao</option>
                                                <option value='3'>Đã giao</option>";
                                            }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
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
