<?php
include_once 'app/views/share/admin/header.php';
?>

<?php
if (isset($errors)) {
    echo "<div class='alert alert-danger'>";
    echo "<ul>";
    foreach ($errors as $err) {
        echo "<li class='text-danger'>$err</li>";
    }
    echo "</ul>";
    echo "</div>";
}
?>

<style>
    .form-group {
        margin-bottom: 1rem;
    }
    .btn {
        background-color: #000;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    

    .btn-primary:hover {
        color: #fff;
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .btn-icon-split {
        padding: 0.375rem 0.75rem;
        margin-top: 10px;
    }
</style>

<div class="card-body p-5">
    <h2 class="text-center mb-4">Chỉnh Sửa Sản Phẩm</h2>
    <form class="user" action="/dienthoai2/product/save" method="post" enctype="multipart/form-data">
        <!-- đang edit cho sản phẩm  -->
        <input type="hidden" name="maSP" value="<?= $product->maSP ?>">
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="name">Tên Sản Phẩm:</label>
                <input value="<?= $product->tenSP ?>" type="text" class="form-control form-control-user" id="tenSP" name="tenSP" placeholder="Product Name">
            </div>
            <div class="col-sm-6">
            <label for="price">Giá Sản Phẩm (VNĐ):</label>
                <input value="<?= $product->gia ?>" type="number" class="form-control form-control-user" id="gia" name="gia" placeholder="Product Price">
            </div>
        </div>
        <div class="col-sm-6">
        <label for="description">Mô Tả Sản Phẩm:</label>
            <input value="<?= $product->chitiet ?>" type="text" class="form-control form-control-user" id="chitiet" name="chitiet" placeholder="Product Description">
        </div>

        <!-- hien thi hinh anh  -->
        <div class="col-sm-6">
        <label for="image">Chọn Hình Ảnh Mới:</label>
            <input value="<?= $product->hinh ?>" type="text" class="form-control form-control-user" id="hinh" name="hinh" placeholder="Product image">
        </div>
        <label for="maLoai">Mã Loại:</label>
            <input value="<?= $product->maLoai ?>" type="text" class="form-control form-control-user" id="maLoai" name="maLoai" placeholder="Product maLoai">
        </div>
       


        
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
                <span class="text">Lưu Sản Phẩm</span>
            </button>
        </div>
    </form>
</div>

<?php
include_once 'app/views/share/admin/footer.php';
?>
