<?php
	$filepath=realpath(dirname(__FILE__));
	include ($filepath.'/../lib/session.php');
	Session::checkLogin();
	include ($filepath.'/../lib/database.php');
	include ($filepath.'/../helpers/format.php');

?>
<?php
	/**
	 * 
	 */
	class adminlogin
	{	
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();// chua cac insert update delete
			$this->fm = new Format();//chua cac quy dinh ve text
		}
		public function login_admin($adminUser,$adminPass)
		{
			$adminUser = $this->fm->validation($adminUser);//goi ham ,validation kiem tra adminUsername co hợp le hay khong
			$adminPass =$this->fm->validation($adminPass);

			$adminUser = mysqli_real_escape_string($this->db->link,$adminUser);//1 bien la du lieu 1 bien ket noi voi co so du lieu
			$adminPass = mysqli_real_escape_string($this->db->link,$adminPass);
			if (empty($adminUser)||empty($adminPass)) {
				# code...
				$alert= "User or Pass must be not empty";
				return $alert;
			}else{
				$query ="SELECT * FROM tbl_admin WHERE adminUser='$adminUser' AND adminPass='$adminPass'LIMIT 1"; // lay ra 1 dieu kien dung nhung khong co quyen thuc thi, adminUser là trong database còn $adminUser là cái name trong input nhập user
				$result=$this->db->select($query);//chon va co quyen thuc thi de chon ra

				if($result != false)//nhap da dung
				{
					$value= $result->fetch_assoc();//truyen cho value
					Session::set('adminlogin',true);//phien dang nhap phai trung khop
					Session::set('Name',$value['adminName']);
					header('Location:index.php');//quay tro ve trang index.php
				}else{
					$alert="User and Pass not match";
					return $alert;
				}
			}
		}
	}
?>