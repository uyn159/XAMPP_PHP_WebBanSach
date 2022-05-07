<?php
	$filepath=realpath(dirname(__FILE__));  
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
	/**
	 * 
	 */ 
	class khachhang
	{	
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();//lay du lieu
			$this->fm = new Format();	
		}
		public function insert_khachhang($data){
			$name = mysqli_real_escape_string($this->db->link,$data['name']);
			$type= mysqli_real_escape_string($this->db->link,$data['type']);
			$city = mysqli_real_escape_string($this->db->link,$data['city']);
			$zipcode = mysqli_real_escape_string($this->db->link,$data['zipcode']);
			$email = mysqli_real_escape_string($this->db->link,$data['email']);
			$address = mysqli_real_escape_string($this->db->link,$data['address']);
			$country = mysqli_real_escape_string($this->db->link,$data['country']);
			$phone = mysqli_real_escape_string($this->db->link,$data['phone']);
			$pass = mysqli_real_escape_string($this->db->link,md5($data['password']));
			if ($name=="" ||$type=="" || $city==""  || $zipcode=="" || $email=="" || $address=="" || $country=="" || $phone=="" || $pass=="")
			{
				$alert="<span Style='color: red;font-weight:Bold;font-size:18px;'>Fields Must Be Not Empty</span>";
					return $alert;
			}else{
					$check_mail="SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
					$result_check=$this->db->select($check_mail);
					if ($result_check) 
					{
						# code...
						$alert="<span Style='color: red;font-weight:Bold;font-size:18px;'>Email bạn chọn đã được sử dụng</span>";
						return $alert;
					}else{

						$query ="INSERT INTO tbl_customer(name,type,city,zipcode,email,address,country,phone,password) VALUES('$name','$type','$city','$zipcode','$email','$address','$country','$phone','$pass')";
						$result=$this->db->insert($query);
					
						if ($result) {
							# code...
							$alert="<span Style='color: green;font-weight:Bold;font-size:18px;'>Customer Created Successfull</span>";
							return $alert;
						}else{
							$alert="<span Style='color: red;font-weight:Bold;font-size:18px;'>Customer Created Not Success</span>";
							return $alert;
						}
					}
				}
			}

		public function show_khachhang(){
			// $query="SELECT * FROM tbl_product order by productId desc";
			$query="
			SELECT* FROM tbl_customer order by id desc";//INNER JOIN là một cl sql có chức năng giao nhau giữa hai bản , như ở trên nó giao nhau và giống nhau ở id giữ 3 bản
			$result =$this->db->select($query);
			return $result;
		}
		public function update_khachhang($data,$id){
			$name = mysqli_real_escape_string($this->db->link,$data['name']);
			$type= mysqli_real_escape_string($this->db->link,$data['type']);
			$city = mysqli_real_escape_string($this->db->link,$data['city']);
			$zipcode = mysqli_real_escape_string($this->db->link,$data['zipcode']);
			$email = mysqli_real_escape_string($this->db->link,$data['email']);
			$address = mysqli_real_escape_string($this->db->link,$data['address']);
			$country = mysqli_real_escape_string($this->db->link,$data['country']);
			$phone = mysqli_real_escape_string($this->db->link,$data['phone']);
			$pass = mysqli_real_escape_string($this->db->link,md5($data['password']));
			
			if ($name=="" ||$type=="" || $city==""  || $zipcode=="" || $email=="" || $address=="" || $country=="" || $phone=="" || $pass=="") {
				# code...
				$alert= "<span class='error'>Thông tin không được để trống</span>";
				return $alert;
			}else{
				$query ="UPDATE  tbl_customer SET name='$name',type='$type',city='$city',zipcode='$zipcode',email='$email',address='$address',country='$country',phone='$phone',password='$pass' WHERE id='$id'";
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
		public function del_khachhang($id){
			$query="DELETE FROM tbl_customer WHERE id='$id'";
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
		public function getkhachhangbyid($id){
			$query="SELECT * FROM tbl_customer WHERE id='$id'";
			$result =$this->db->select($query);
			return $result;
		}
	}
?>
