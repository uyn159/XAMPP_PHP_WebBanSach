<?php
/**
*Session Class
**/
class Session{//moi lan thiem hoac thanh toan hoac dang nhap ,luu  cai phien giao dich , van con luu trang giao dich
 public static function init(){//tao cai session ban dau
  if (version_compare(phpversion(), '5.4.0', '<')) {
        if (session_id() == '') {
            session_start();
        }
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
 }

 public static function set($key, $val){//cho key là giá trị truyền vào bên admin login,EX: login vao admin thi no xuat ra gia tri admin
    $_SESSION[$key] = $val;
 }

 public static function get($key){//get cac gia tri
    if (isset($_SESSION[$key])) {
     return $_SESSION[$key];
    } else {
     return false;
    }
 }

 public static function checkSession(){//check xem phien lam viec nay co ton tai hay khoong
    self::init();
    if (self::get("adminlogin")== false) {//sai se dua ban tro lai trang login du co ghi duong da
     self::destroy();
     header("Location:login.php");
    }
 }
 public static function checkSession2(){//check xem phien lam viec nay co ton tai hay khoong
    self::init();
    if (self::get("userlogin")== false) {//sai se dua ban tro lai trang login du co ghi duong da
     self::destroy();
     header("Location:login.php");
    }
 }


 public static function checkLogin(){//check login
    self::init();
    if (self::get("adminlogin")== true) {//dung thi se dua vao trang index
     header("Location:index.php");
    }
 }
  public static function checkLogin2(){//check login
    self::init();
    if (self::get("userlogin")== true) {//dung thi se dua vao trang index
     header("Location:index2.php");
    }
 }

 public static function destroy(){//huy cai phien lam viet do
  session_destroy();
  header("Location:login.php");
 }
}
?>