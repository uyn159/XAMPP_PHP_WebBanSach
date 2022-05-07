<?php
	$filepath=realpath(dirname(__FILE__));  
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
	/**
	 * 
	 */ 
	class user
	{	
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();//lay du lieu
			$this->fm = new Format();	
		}
		public function insert_user($data)	
		{
			$ten = mysqli_real_escape_string($this->db->link,$data['username']);
			$user = mysqli_real_escape_string($this->db->link,$data['user']);
			$pass = mysqli_real_escape_string($this->db->link,$data['userpass']);
			if ($user=="" || $ten=="" || $pass=="") {
				# code...
				$alert= "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query ="INSERT INTO tbl_user(username,user,userpass) VALUES('$ten','$user','$pass')";
				$result=$this->db->insert($query);//chon va co quyen thuc thi de chon ra
				if ($result) {
					# code...
					$alert="<span class='success'>Thêm tài khoảng nhân viên</span>";
					return $alert;
				}else
					$alert="<span class='error'>Thêm tài khoảng nhân viên không thành công</span>";
					return $alert;
			}
		}

		public function show_user(){
			// $query="SELECT * FROM tbl_product order by productId desc";
			$query="
			SELECT* FROM tbl_user order by userId desc";//INNER JOIN là một cl sql có chức năng giao nhau giữa hai bản , như ở trên nó giao nhau và giống nhau ở id giữ 3 bản
			$result =$this->db->select($query);
			return $result;
		}
		public function update_user($data,$id)
			{
			$ten = mysqli_real_escape_string($this->db->link,$data['username']);
			$user = mysqli_real_escape_string($this->db->link,$data['user']);
			$pass = mysqli_real_escape_string($this->db->link,$data['userpass']);
			if ($user=="" || $ten=="" || $pass=="") {
				# code...
				$alert= "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query ="UPDATE  tbl_user SET user='$ten' WHERE userId='$id'";
				$result=$this->db->update($query);//chon va co quyen thuc thi
				if ($result) {
					# code...
					$alert="<span class='success'>Thông tin đã được sửa đổi</span>";
					return $alert;
				}else
					$alert="<span class='error'>Thông tin sửa đổi không thành công</span>";
					return $alert;
			}			
		}
		public function del_user($id){
			$query="DELETE FROM tbl_user WHERE userId='$id'";
			$result =$this->db->delete($query);
			if ($result) {
					# code...
					$alert="<span class='success'>Thông tin đã xóa</span>";
					return $alert;
				}else
					$alert="<span class='error'>Lỗi</span>";
					return $alert;
			return $result;
		}
		public function getuserbyid($id){
			$query="SELECT * FROM tbl_user WHERE userId='$id'";
			$result =$this->db->select($query);
			return $result;
		}
	}
?>
