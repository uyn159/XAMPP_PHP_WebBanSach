<?php
	$filepath=realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/session.php');
	Session::checkLogin2();//neu get login ma dung thi se location trang index
	Session::checkLogin();
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');

?>
<?php
	/**
	 * 
	 */
	class userlogin
	{	
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();// chua cac insert update delete
			$this->fm = new Format();//chua cac quy dinh ve text
		}
		public function userlogin($adminUser,$adminPass)
		{
			$adminUser = $this->fm->validation($adminUser);//goi ham ,validation kiem tra adminUsername co hopj le hay khong
			$adminPass =$this->fm->validation($adminPass);

			$adminUser = mysqli_real_escape_string($this->db->link,$adminUser);//1 bien la du lieu 1 bien ket noi voi co so du lieu
			$adminPass = mysqli_real_escape_string($this->db->link,$adminPass);
			if (empty($adminUser)||empty($adminPass)) {
				# code...
				$alert= "User or Pass must be not empty";
				return $alert;
			}else{
				$query ="SELECT * FROM tbl_nhanvien WHERE TNV='$adminUser' AND SDTNV='$adminPass'LIMIT 1"; // lay ra 1 dieu kien dung nhung khong co quyen thuc thi
				$result=$this->db->select($query);//chon va co quyen thuc thi de chon ra

				if($result != false)//nhap da dung
				{
					$value= $result->fetch_assoc();//truyen cho value
					Session::set('userlogin',true);//phien dang nhap phai trung khop
					Session::set('nhanvienid',$value['NVId']);
					Session::set('Name',$value['TNV']);
					header('Location:index2.php');//quay tro ve trang index
				}else{
					$alert="User and Pass not match";
					return $alert;
				}
			}
		}
	}
?>