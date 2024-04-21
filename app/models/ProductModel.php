<?php
class ProductModel {
    private $conn;
    private $table_name = "sanpham";

    public function __construct($db) {
        $this->conn = $db;
    }

    function readAll() {
        $query = "SELECT maSP, tenSP, chitiet, gia, hinh, maLoai FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function readAllTenSP($tenSP) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE tenSP LIKE '%$tenSP%'";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    
    function readAllLoaiSP($maLoai) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE maLoai = $maLoai";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function createProduct($name, $description, $price, $uploadResult, $maLoai)
    {
        // uploadResult: đường dẫn của file hình 
        // uploadResult = false: lỗi upload hình ảnh
        // Kiểm tra ràng buộc đầu vào
        $errors = [];
        if (empty($name)) {
            $errors['tenSP'] = 'Tên sản phẩm không được để trống';
        }
        if (empty($description)) {
            $errors['chitiet'] = 'Mô tả không được để trống';
        }
        if (!is_numeric($price) || $price < 0) {
            $errors['gia'] = 'Giá sản phẩm không hợp lệ';
        }
        if (empty($maLoai)) {
            $errors['maLoai'] = 'Mô tả không được để trống';
        }
        if ($uploadResult == false) {
            $errors['hinh'] = 'Vui lòng chọn hình ảnh hợp lệ!';
        }

        if (count($errors) > 0) {
            return $errors;
        }

        // Truy vấn tạo sản phẩm mới

        $query = "INSERT INTO " . $this->table_name . " (tenSP, chitiet, gia, hinh, maLoai) VALUES (:tenSP, :chitiet, :gia, :hinh, :maLoai)";
        $stmt = $this->conn->prepare($query);

        // Làm sạch dữ liệu
        $name = htmlspecialchars(strip_tags($name));
        $description = htmlspecialchars(strip_tags($description));
        $price = htmlspecialchars(strip_tags($price));
        $price = htmlspecialchars(strip_tags($maLoai));


        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':tenSP', $name);
        $stmt->bindParam(':chitiet', $description);
        $stmt->bindParam(':gia', $price);
        $stmt->bindParam(':hinh', $uploadResult);
        $stmt->bindParam(':maLoai', $maLoai);


        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function getProductById($id){

        $query = "SELECT * FROM " . $this->table_name . " where maSP = $id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    function updateProduct($maSP, $tenSP, $chitiet, $gia, $hinh, $maLoai){

        if ($hinh) {
            $query = "UPDATE " . $this->table_name . " SET tenSP=:tenSP, chitiet=:chitiet, gia=:gia, hinh=:hinh, maloai=:maLoai WHERE maSP=:maSP";
        } else {
            $query = "UPDATE " . $this->table_name . " SET tenSP=:tenSP, chitiet=:chitiet, gia=:gia, maloai=:maloai WHERE maSP=:maSP";
        }

        $stmt = $this->conn->prepare($query);
        // Làm sạch dữ liệu
        $name = htmlspecialchars(strip_tags($tenSP));
        $description = htmlspecialchars(strip_tags($chitiet));
        $price = htmlspecialchars(strip_tags($gia));
        $price = htmlspecialchars(strip_tags($maLoai));
        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':maSP', $maSP);
        $stmt->bindParam(':tenSP', $tenSP);
        $stmt->bindParam(':chitiet', $chitiet);
        $stmt->bindParam(':gia', $gia);
        $stmt->bindParam(':maLoai', $maLoai);
        if($hinh){
            $stmt->bindParam(':hinh', $hinh);
        }
        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


    public function deleteProduct($maSP) {
        $query = "DELETE FROM " . $this->table_name . " WHERE maSP = :maSP";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':maSP', $maSP);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}