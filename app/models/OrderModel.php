<?php
class OrderModel {
    private $conn;
    private $table_name = "donhang";
    private $chitiet = "chitiethoadon";

    public function __construct($db) {
        $this->conn = $db;
    }

    function readID($id) {
        $query = "SELECT * FROM " . $this->table_name . "WHERE maDH = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id); // Đảm bảo rằng email được xử lý như một chuỗi
        $stmt->execute();
        return $stmt;
    }

    function readAll(){
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    function countAll() {
        $query = "SELECT COUNT(*) as dem FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['dem'];
    }
    
    function getMaxMaHD() {
        $query = "SELECT MAX(maDH) AS max_maHD FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['max_maHD'];
    }
    function getDonHangById($id){
        // Sử dụng truy vấn chuẩn bị để tránh SQL Injection
        $query = "SELECT donHang.maDH, donhang.ngayTao, donhang.hoTen, chitiethoadon.thanhTien, donhang.trangThai FROM " . $this->table_name . " INNER JOIN " . $this->chitiet . " ON donhang.maDH = chitiethoadon.maDH WHERE donhang.maDH = :id";
        $stmt = $this->conn->prepare($query);
        // Gán giá trị cho tham số :id
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    
    function getCTDonHangById($id){
        // Sử dụng truy vấn chuẩn bị để tránh SQL Injection
        $query = "SELECT SUM(thanhTien) AS total FROM " . $this->chitiet . " WHERE maDH = :id";

        $stmt = $this->conn->prepare($query);
        // Gán giá trị cho tham số :id
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        
        return $result;
    }
    function createOrder($hoTen, $dienThoai, $email, $diachi, $ghichu, $phuongThucThanhToan, $date, $maID, $trangThai="1")
{
    // Kiểm tra ràng buộc đầu vào
    $errors = [];
    if (empty($hoTen)) {
        $errors['hoTen'] = 'Tên không được để trống';
    }
    if (empty($dienThoai)) {
        $errors['dienThoai'] = 'Dien thoai khong dc de trong';
    }
    if (empty($email)) {
        $errors['email'] = 'Email khong duoc de trong';
    }

    // Nếu có lỗi, trả về mảng các lỗi
    if (!empty($errors)) {
        return $errors;
    }

    // Truy vấn tạo đơn hàng mới
    $query = "INSERT INTO " . $this->table_name . " (hoTen, dienThoai, email, diachi, ghiChu, phuongThucThanhToan, ngayTao, maID, trangThai) VALUES (:hoTen, :dienThoai, :email, :diachi, :ghichu, :phuongThucThanhToan, :date, :maID, :trangThai)";
    $stmt = $this->conn->prepare($query);

    // Làm sạch dữ liệu
    $hoTen = htmlspecialchars(strip_tags($hoTen));
    $dienThoai = htmlspecialchars(strip_tags($dienThoai));
    $email = htmlspecialchars(strip_tags($email));
    $diachi = htmlspecialchars(strip_tags($diachi));
    $ghichu = htmlspecialchars(strip_tags($ghichu));
    $phuongThucThanhToan = htmlspecialchars(strip_tags($phuongThucThanhToan));

    // Gán dữ liệu vào câu lệnh
    $stmt->bindParam(':hoTen', $hoTen);
    $stmt->bindParam(':dienThoai', $dienThoai);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':diachi', $diachi);
    $stmt->bindParam(':ghichu', $ghichu);
    $stmt->bindParam(':phuongThucThanhToan', $phuongThucThanhToan);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':maID', $maID);
    $stmt->bindParam(':trangThai', $trangThai);


    // Thực thi câu lệnh
    if ($stmt->execute()) {
        return true;
    }

    return false;
}


function updateDonHang($maDH, $trangThai){
    // Kiểm tra xem table_name đã được đặt giá trị chưa
    if(empty($this->table_name)) {
        return false; // hoặc bạn có thể throw một exception tùy vào cách xử lý của bạn
    }
    
    // Câu lệnh SQL cần có khoảng trắng sau tên bảng
    $query = "UPDATE " . $this->table_name . " SET trangThai=:trangThai WHERE maDH=:maDH";
    $stmt = $this->conn->prepare($query);
    
    // Làm sạch dữ liệu
    $trangThai = htmlspecialchars(strip_tags($trangThai));
    
    // Gán dữ liệu vào câu lệnh
    $stmt->bindParam(':maDH', $maDH);
    $stmt->bindParam(':trangThai', $trangThai);
    
    // Thực thi câu lệnh
    if ($stmt->execute()) {
        return true;
    }
    return false;
} 

    
}