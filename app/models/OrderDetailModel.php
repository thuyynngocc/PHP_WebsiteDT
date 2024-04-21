<?php
class OrderDetailModel {
    private $conn;
    private $table_name = "chitiethoadon";
    private $table_nameP = "sanpham";

    public function __construct($db) {
        $this->conn = $db;
    }

    function readAll() {
        $query = "SELECT orderDetailID, products.name , products.price FROM " . $this->table_name. "," .$this->table_nameP ."WHERE orderdetails.productID = products.id" ;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    
  

    function createDetailOrder($orderID, $productID, $soLuong, $donGia, $thanhTien)
    {
        // uploadResult: đường dẫn của file hình 
        // uploadResult = false: lỗi upload hình ảnh
        // Kiểm tra ràng buộc đầu vào
      


        // Truy vấn tạo sản phẩm mới

        $query = "INSERT INTO " . $this->table_name . " (maDH, maSP, soLuong, donGia, thanhTien) VALUES (:maDH, :maSP, :soLuong, :donGia, :thanhTien)";
        $stmt = $this->conn->prepare($query);

        // Làm sạch dữ liệu
        $hoTen = htmlspecialchars(strip_tags($orderID));
        $dienThoai = htmlspecialchars(strip_tags($productID));
        $email = htmlspecialchars(strip_tags($soLuong));
        $diachi = htmlspecialchars(strip_tags($donGia));
        $ghichu = htmlspecialchars(strip_tags($thanhTien));

        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':maDH', $orderID);
        $stmt->bindParam(':maSP', $productID);
        $stmt->bindParam(':soLuong', $soLuong);
        $stmt->bindParam(':donGia', $donGia);
        $stmt->bindParam(':thanhTien', $thanhTien);
        
           
        

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    

    
}