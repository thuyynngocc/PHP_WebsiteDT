<?php
include_once 'app/views/share/admin/header.php';
?>
<style>
    .btn {
        background-color: #000;
        color: #fff;
    }

    .btn:hover {
        background-color: #333;
    }

    .form-control {
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .card-body {
        background-color: #f8f9fc;
        border: 1px solid #e3e6f0;
        border-radius: 8px;
    }

    .btn-icon-split {
        padding: 10px 20px;
    }
</style>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    if (empty($_POST["name"])) {
        $errors[] = "Tên sản phẩm không được để trống.";
    }

    if (empty($_POST["price"]) || !is_numeric($_POST["price"]) || $_POST["price"] <= 0) {
        $errors[] = "Giá sản phẩm phải là một số dương.";
    }

    if (empty($_POST["description"])) {
        $errors[] = "Mô tả sản phẩm không được để trống.";
    }

    if (empty($_FILES["image"]["name"])) {
        $errors[] = "Hình ảnh sản phẩm không được để trống.";
    }

    if (empty($errors)) {
        // Lưu sản phẩm vào cơ sở dữ liệu
        // Chuyển hình ảnh vào thư mục lưu trữ
        // Redirect hoặc thông báo lưu thành công
    } else {
        echo "<div class='alert alert-danger'>";
        echo "<ul>";
        foreach ($errors as $err) {
            echo "<li>$err</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
}
?>

<div class="card-body p-5">
    <h2 class="text-center mb-4">Thêm Sản Phẩm</h2>
    <form class="user" action="/dienthoai2/product/save" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="name">Tên Sản Phẩm:</label>
                <input type="text" class="form-control" id="tenSP" name="tenSP" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="col-sm-6">
                <label for="price">Giá Sản Phẩm (VNĐ):</label>
                <input type="number" class="form-control" id="gia" name="gia" placeholder="Nhập giá sản phẩm">
            </div>
        </div>
        <div class="form-group">
            <label for="description">Mô Tả Sản Phẩm:</label>
            <textarea class="form-control" id="chitiet" name="chitiet" placeholder="Nhập mô tả sản phẩm" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Hình Ảnh Sản Phẩm:</label>
            <input type="text" class="form-control" id="hinh" name="hinh" placeholder="Nhap hinh sản phẩm">
            <!-- <input type="file" class="form-control-file" id="image" name="image"> -->
        </div>
        <div class="col-sm-6">
                <label for="name">Mã Loại:</label>
                <input type="text" class="form-control" id="maLoai" name="maLoai" placeholder="Nhập tên sản phẩm">
            </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Lưu Sản Phẩm</span>
            </button>
        </div>
    </form>
</div>

<?php
include_once 'app/views/share/admin/footer.php';
?>
