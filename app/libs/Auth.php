<?php

class Auth{
    //kiem tra trang thai nguoi dung da dang nhap?
    static function isLoggedIn(){
        return isset($_SESSION['email']);
    }
    //kiem tra quyen co phai la admin?
    static function isAdmin(){
        return (isset($_SESSION['email']) && $_SESSION['role']=="ADMIN");
    }
    //kiem tra co phai la user?
    static function isUser(){
        return (isset($_SESSION['email']) && $_SESSION['role']=="USER");
    }
}