<?php
include_once 'app/views/share/admin/header.php';
?>
<style>
    .custom-btn {
        background-color: black;
        /* Đặt màu nền của button là đen */
        color: white;
        /* Đặt màu chữ của button là trắng */
    }

    .custom-btn:hover {
        background-color: #333;
        /* Màu nền button khi hover */
        color: white;
        /* Màu chữ button khi hover */
    }
    .delete-btn {
            background-color: #dc3545; /* Màu đỏ */
            color: white;
        }

        .delete-btn:hover {
            background-color: #c82333; /* Màu đỏ sáng khi hover */
            color: white;
        }
        .btn{
background-color: #000;
        }
</style>
<script>
        function confirmDelete() {
            return confirm("Bạn có chắc chắn muốn xoá sản phẩm này không?");
        }
    </script>
<div class="row">

    <a href="/dienthoai2/product/add" class="btn btn-icon-split custom-btn">
        <span class="icon text-white-50">
            <i class="fas fa-flag"></i>
        </span>
        <span class="text">Add Product</span>
    </a>
    <div class="col-sm-12">
    <br>

      
        <div class="container">
        <h2 class="text-center mb-4">Quản Lý Sản Phẩm</h2>
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình</th>
                        <th>Mô Tả</th>
                        <th>Giá</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = $products->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td>  <?= $row['tenSP'] ?></td>
                      <td>  <?php
                             if (empty($row['hinh']) || !file_exists($row['hinh'])) {
                                echo "No Image!";
                            } else {
                                echo "<img width='50px' height='50px' class="."product__image"." src='/dienthoai2/" . $row['hinh'] . "' alt='' />";
                            }
                            ?></td>
                        <td> <?= $row['chitiet'] ?></td>
                        <td> <?= $row['gia'] ?></td>
                        <td>
                            <a href="/dienthoai2/product/edit/<?= $row['maSP'] ?>" class="btn btn-warning btn-sm">Chỉnh Sửa</a>
                            <a class="btn btn-warning btn-sm" href="/dienthoai2/product/delete?id=<?= $row['maSP'] ?>" >
                                 Xóa
                            </a>
                            <!-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal">Xóa</button> -->
</td>

<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Xác Nhận Xóa Sản Phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa sản phẩm này không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <a data-target="#confirmDeleteModal" data-toggle="modal" class="btn btn-secondary" href="/dienthoai2/product/delete?id=<?= $row['maSP'] ?>" >
                Xóa
                            </a>
                
            </div>
        </div>
    </div>
</div>
                    </tr>
                    <?php endwhile; ?>
                    <!-- Thêm các hàng khác ở đây -->
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>



<?php

include_once 'app/views/share/admin/footer.php';

?>