<?php
class UserModel{
    private $conn;
    private $table_name = "users";

    public function __construct($db) {
        $this->conn = $db;
    }
    function readAll() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function getAccountByUsername($email){
        $query = "SELECT * FROM " . $this->table_name . " where email = :email";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":email", $email);

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    function getAccountByID($maID){
        $query = "SELECT * FROM " . $this->table_name . " where maID = :maID";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":maID", $maID);

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    function save($username, $name, $password, $role="USER"){

        $query = "INSERT INTO " . $this->table_name . " (hoTen, email, matKhau, role) VALUES (:hoTen, :email, :matKhau, :role)";
        
        $stmt = $this->conn->prepare($query);

        // Làm sạch dữ liệu
        $name = htmlspecialchars(strip_tags($name));
        $username = htmlspecialchars(strip_tags($username));

        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':hoTen', $name);
        $stmt->bindParam(':email', $username);
        $stmt->bindParam(':matKhau', $password);
        $stmt->bindParam(':role', $role);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    function updateUser($maID, $role){
        // Kiểm tra xem table_name đã được đặt giá trị chưa
        if(empty($this->table_name)) {
            return false; // hoặc bạn có thể throw một exception tùy vào cách xử lý của bạn
        }
        
        // Câu lệnh SQL cần có khoảng trắng sau tên bảng
        $query = "UPDATE " . $this->table_name . " SET role=:role WHERE maID=:maID";
        $stmt = $this->conn->prepare($query);
        
        // Làm sạch dữ liệu
        $role = htmlspecialchars(strip_tags($role));
        
        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':maID', $maID);
        $stmt->bindParam(':role', $role);
        
        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    
}