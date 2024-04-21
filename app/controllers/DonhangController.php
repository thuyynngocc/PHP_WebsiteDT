<?php
class DonhangController
{

    private $orderModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->orderModel = new OrderModel($this->db);
    }

   
    
   
    
    public function listDonHang()
    {

        //$stmt = $this->orderModel->readAll();
        $donhangs = $this->orderModel->readAll();
        include_once 'app/views/donHang/donhang.php';
    }
    
    public function add()
    {
        include_once 'app/views/admin-product/add.php';
    }

    public function save()
    {
        //lưu sản phẩm vào CSDL, kèm upload hình ảnh lên thư mục uploads/ của server
        //cập nhật tên đường dẫn hình ảnh vào cột image của bảng Product
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['tenSP'] ?? '';
            $description = $_POST['chitiet'] ?? '';
            $price = $_POST['gia'] ?? '';
            $maLoai = $_POST['maLoai']?? '';
            if (isset($_POST['maSP'])) {
                //update
                $id = $_POST['maSP'];
            }

            //$uploadResult = false;
           // kiểm tra để lưu hình ảnh
            // if (!empty($_FILES["hinh"]['size'])) {
            //     //luu hinh
            //     //$uploadResult = $this->uploadImage($_FILES["hinh"]);
            //    $uploadResult= $_POST['hinh']?? '';
            // }
            $uploadResult= $_POST['hinh']?? '';

            //lưu sản phẩm
          //  if (!isset($id))
            // thêm sản phẩm 
               // $result = $this->orderModel->createProduct($name, $description, $price, $uploadResult, $maLoai);
           // else
            // update sản phẩm 
                //$result = $this->orderModel->updateProduct($id, $name, $description, $price, $uploadResult, $maLoai);

            // if (is_array($result)) {
            //     // Có lỗi, hiển thị lại form với thông báo lỗi
            //     $errors = $result;
            //     include 'app/views/admin/product/add.php';
            // } else {
            //     // Không có lỗi, chuyển hướng ve trang chu hoac trang danh sach
            //     header('Location: /dienthoai2');
            // }
        }
    }

    //hàm upload hình ảnh lên thư mục uploads của server
    public function uploadImage($file)
    {
        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Kiểm tra xem file có phải là hình ảnh thực sự hay không
        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Kiểm tra kích thước file
        if ($file["size"] > 500000) { // Ví dụ: giới hạn 500KB
            $uploadOk = 0;
        }

        // Kiểm tra định dạng file
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        }

        // Kiểm tra nếu $uploadOk bằng 0
        if ($uploadOk == 0) {
            return false;
        } else {
            if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                //đường dẫn của file hình
                return $targetFile;
            } else {
                //không upload được hình
                return false;
            }
        }
    }


    public function chitiet($id)
    {

        $donhang = $this->orderModel->getDonHangById($id);
        $chitiet = $this->orderModel->getCTDonHangById($id);
        if (empty($donhang)) {
            include_once 'app/views/share/not-found.php';
        } else {
            include_once 'app/views/donHang/chitietdonhang.php';
        }
    }


    public function suatrangThaiDonHang($id)
    {

        $donhang = $this->orderModel->getDonHangById($id);

        if (empty($donhang)) {
            include_once 'app/views/share/not-found.php';
        } else {
            include_once 'app/views/donHang/trangthai.php';
        }
    }

    public function delete() {
        // if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['maSP'])) {
        //     $id = $_GET['maSP'];
            
        //     $orderModel = new orderModel($this->db);
        //     $result = $orderModel->deleteProduct($id);
            
        //     if ($result) {
        //         //include_once 'app/views/product/edit.php';
        //         header('Location: /dienthoai2/product/listProducts');
        //     } else {

        //         echo "Failed to delete product.";
        //     }
        // }
    }
    public function sua()
    {
        //lưu sản phẩm vào CSDL, kèm upload hình ảnh lên thư mục uploads/ của server
        //cập nhật tên đường dẫn hình ảnh vào cột image của bảng Product
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $trangThai = $_POST['trangThai']?? '';
            if (isset($_POST['maDH'])) {
                //update
                $maDH = $_POST['maDH'];
            }
         
            //lưu sản phẩm
          
                $result = $this->orderModel->updateDonHang($maDH, $trangThai);

            if (is_array($result)) {
                // Có lỗi, hiển thị lại form với thông báo lỗi
                $errors = $result;
                include 'dienthoai2/user/admin';
            } else {
                // Không có lỗi, chuyển hướng ve trang chu hoac trang danh sach
                header('Location: /dienthoai2/donhang/listDonHang');
            }
        }
    }
}

