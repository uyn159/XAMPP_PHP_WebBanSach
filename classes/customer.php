<?php  
	$filepath=realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');//đăng ký đăng nhập va đặt hàng
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
	/**
	 * 
	 */ 
	class customer
	{	
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();//lay du lieu
			$this->fm = new Format();	
		}
		public function insert_customers($data){
			$name = mysqli_real_escape_string($this->db->link,$data['name']);
			$city = mysqli_real_escape_string($this->db->link,$data['city']);
			$zipcode = mysqli_real_escape_string($this->db->link,$data['zipcode']);
			$email = mysqli_real_escape_string($this->db->link,$data['email']);
			$address = mysqli_real_escape_string($this->db->link,$data['address']);
			$country = mysqli_real_escape_string($this->db->link,$data['country']);
			$phone = mysqli_real_escape_string($this->db->link,$data['phone']);
			$pass = mysqli_real_escape_string($this->db->link,md5($data['password']));
			if ($name=="" || $city==""  || $zipcode=="" || $email=="" || $address=="" || $country=="" || $phone=="" || $pass=="")
			{
				$alert="<span Style='color: red;font-weight:Bold;font-size:18px;'>Fields Must Be Not Empty</span>";
					return $alert;
			}else{
					$check_mail="SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
					$result_check=$this->db->select($check_mail);
					if ($result_check) 
					{
						# code...
						$alert="<span Style='color: red;font-weight:Bold;font-size:18px;'>Email Already Existed</span>";
						return $alert;
					}else{

						$query ="INSERT INTO tbl_customer(name,city,zipcode,email,address,country,phone,password) VALUES('$name','$city','$zipcode','$email','$address','$country','$phone','$pass')";
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
			public function login_customers($data){
				$email = mysqli_real_escape_string($this->db->link,$data['email']);
				$pass = mysqli_real_escape_string($this->db->link,md5($data['pass']));
			if ($email=="" || $pass=="")
			{
				$alert="<span Style='color: red;font-weight:Bold;font-size:18px;'>Password and Email Must Be Not Empty</span>";
					return $alert;
			}else{
					$check_login="SELECT * FROM tbl_customer WHERE email='$email' AND password='$pass'";
					$result_check=$this->db->select($check_login);
					if ($result_check!= false) 
					{
						# code...
						$value=$result_check->fetch_assoc();
						Session::set('cs_lg',true);
						Session::set('cs_id',$value['id']);
						Session::set('cs_name',$value['name']);
						header('Location:order.php');
					}else{
						$alert="<span Style='color: red;font-weight:Bold;font-size:18px;'>Email or Password doesn't match</span>";
						return $alert;
					}
				}
			}
			public function show_customers($id){// trang profile
				$check="SELECT * FROM tbl_customer WHERE id ='$id'";
				$result=$this->db->select($check);
				return $result;

			}
			// public function show_customers($id){// trang profile
			// 	$check="SELECT * FROM tbl_nhanvien WHERE NVId ='$id'";
			// 	$result=$this->db->select($check);
			// 	return $result;

			// }
			public function update_customers($data,$id){
			$name = mysqli_real_escape_string($this->db->link,$data['name']);
			$zipcode = mysqli_real_escape_string($this->db->link,$data['zipcode']);
			$email = mysqli_real_escape_string($this->db->link,$data['email']);
			$address = mysqli_real_escape_string($this->db->link,$data['address']);
			$phone = mysqli_real_escape_string($this->db->link,$data['phone']);
			if ($name=="" || $zipcode=="" || $email=="" || $address=="" || $phone=="")
			{
				$alert="<span Style='color: red;font-weight:Bold;font-size:18px;'>Fields Must Be Not Empty</span>";
					return $alert;
			}else{

						$query ="UPDATE tbl_customer SET name='$name',zipcode='$zipcode',email='$email',address='$address',phone='$phone' WHERE id='$id'";
						$result=$this->db->insert($query);
					
						if ($result) {
							# code...
							$alert="<span Style='color: green;font-weight:Bold;font-size:18px;'>Customer Updated Successfully</span>";
							return $alert;
						}else{
							$alert="<span Style='color: red;font-weight:Bold;font-size:18px;'>Customer Updated Not Successfully</span>";
							return $alert;
						}
					}
				}
		}
	?>