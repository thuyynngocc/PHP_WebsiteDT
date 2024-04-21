<?php

class UserController{

    private $db;
    private $userModel;

    function __construct(){
        $this->db = (new Database())->getConnection();
        $this->userModel = new UserModel($this->db);
    }

    function login(){
        include_once 'app/views/account/dangnhap.php';
    }

    function admin(){
        $users = $this->userModel->readAll();
        include_once 'app/views/admin/quanLyTaiKhoan.php';
    }
    function chiTiet($maID){
        $users = $this->userModel->getAccountByID($maID);
        include_once 'app/views/admin/chitiet.php';
    }
    function chinhSua($maID){
        $users = $this->userModel->getAccountByID($maID);
        include_once 'app/views/admin/chinhsua.php';
    }

    function register(){
        include_once 'public/dangky.php';
    }

    function save(){
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = $_POST['hoTen'] ?? '';
            $username = $_POST['email'] ?? '';
            $password = $_POST['matKhau'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            $errors =[];
            if(empty($fullname)){
                $errors['fullname'] = "Vui long nhap fullname!";
            }
            if(empty($username)){
                $errors['email'] = "Vui long nhap email!";
            }
            if(empty($password)){
                $errors['password'] = "Vui long nhap password!";
            }
            if($password != $confirmPassword){
                $errors['confirmPass'] = "Mat khau va xac nhan chua dung";
            }
            //kiểm tra username đã được đăng ký chưa?
            $account = $this->userModel->getAccountByUsername($username);

            if($account){
                $errors['account'] = "Tai khoan nay da co nguoi dang ky!";
            }
            
            if(count($errors) > 0){
                include_once 'public/dangky.php';
            }else{
                $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
                $result = $this->userModel->save($username, $fullname, $password);
                
                if($result){
                    header('Location: /dienthoai2/user/login');
                }
            }
        }       
       
    }
    function checklogin(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['email'] ?? '';
            $password = $_POST['matKhau'] ?? '';

            $errors =[];
            if(empty($username)){
                $errors['username'] = "Vui long nhap userName!";
            }
            if(empty($password)){
                $errors['password'] = "Vui long nhap password!";
            }
            if(count($errors) > 0){
                include_once 'app/views/account/dangnhap.php';
            }
            $account = $this->userModel->getAccountByUsername($username);
            
            if($account || password_verify($password, $account->matKhau)){
               // if(password_verify($password, $account->matKhau)){
                    // Đăng nhập thành công
                    // Lưu trạng thái đăng nhập
            if($account->role == "USER"){
                $_SESSION['email'] = $account->email;
                $_SESSION['role'] = $account->role;
                $_SESSION['maID'] = $account->maID; 
                header('Location: /dienthoai2');
                exit; 
            }else{
                $_SESSION['email'] = $account->email;
                $_SESSION['role'] = $account->role;
                $_SESSION['maID'] = $account->maID; 
                header('Location: /dienthoai2/user/admin');
                exit; 
            }
                    // Dừng việc chạy mã sau khi chuyển hướng
               // } else {
                    // Mật khẩu không khớp
                   // header('Location: /dienthoai2');
                    //$errors['account'] = "Mật khẩu không chính xác!";
              //  }
            } else {
                // Tài khoản không tồn tại
                $errors['account'] = "Tài khoản không tồn tại!";
            }
        }
    }

    public function sua()
    {
        //lưu sản phẩm vào CSDL, kèm upload hình ảnh lên thư mục uploads/ của server
        //cập nhật tên đường dẫn hình ảnh vào cột image của bảng Product
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $role = $_POST['role']?? '';
            if (isset($_POST['maID'])) {
                //update
                $id = $_POST['maID'];
            }
         
            //lưu sản phẩm
          
                $result = $this->userModel->updateUser($id, $role);

            if (is_array($result)) {
                // Có lỗi, hiển thị lại form với thông báo lỗi
                $errors = $result;
                include 'dienthoai2/user/admin';
            } else {
                // Không có lỗi, chuyển hướng ve trang chu hoac trang danh sach
                header('Location: /dienthoai2/user/admin');
            }
        }
    }

    function logout(){
        
        unset($_SESSION['email']);
        unset($_SESSION['role']);
        unset($_SESSION['maID']);

        header('Location: /dienthoai2');
    }
}