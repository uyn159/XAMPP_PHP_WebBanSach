<?php
/**
* Format Class
*/
class Format{
 public function formatDate($date){
    return date('F j, Y, g:i a', strtotime($date));
 }

 public function textShorten($text, $limit = 400){//tieu de chuan shiel
    $text = $text. " ";
    $text = substr($text, 0, $limit);
    $text = substr($text, 0, strrpos($text, ' '));
    $text = $text.".....";
    return $text;
 }

 public function validation($data){//form kiem tra trong hay khong trong
    $data = trim($data);
    $data = stripcslashes($data);//xóa bỏ gạch chéo
    $data = htmlspecialchars($data);//chuyển đổi 1 số kí tự quy định trước thành thực thể
    return $data;
 }

 public function title(){//kiemn tra ten cau server
    $path = $_SERVER['SCRIPT_FILENAME'];
    $title = basename($path, '.php');
    //$title = str_replace('_', ' ', $title);
    if ($title == 'index') {
     $title = 'home';
    }elseif ($title == 'contact') {
     $title = 'contact';
    }
    return $title = ucfirst($title);
   }
public function format_currency($n=0){
    $n=(string)$n;
    $n=strrev($n);
    $res='';
    for ($i=0; $i < strlen($n); $i++) { 
        # code...
        if ($i%3==0 && $i!=0) {
            # code...
            $res.='.';
            }
        $res.=$n[$i];
        }
        $res=strrev($res);
        return $res;
    }
}
?>