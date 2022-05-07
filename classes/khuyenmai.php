<?php
	$filepath=realpath(dirname(__FILE__));  
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
	/**
	 * 
	 */ 
	class khuyenmai
	{	
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();//lay du lieu
			$this->fm = new Format();	
		}
		public function insert_khuyenmai($data)	
		{
			$ten = mysqli_real_escape_string($this->db->link,$data['TKM']);
			$ngaybd = mysqli_real_escape_string($this->db->link,$data['NBD']);
			$ngaykt = mysqli_real_escape_string($this->db->link,$data['NKT']);
			
			if ($ten=="" || $ngaybd==""|| $ngaykt=="") {
				# code...
				$alert= "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query ="INSERT INTO tbl_khuyenmai(TKM,NBD,NKT) VALUES('$ten','$ngaybd','$ngaykt')";
				$result=$this->db->insert($query);//chon va co quyen thuc thi de chon ra
				if ($result) {
					# code...
					$alert="<span class='success'>Thêm khuyến mãi công</span>";
					return $alert;
				}else
					$alert="<span class='error'>Thêm khuyến mãi không thành công</span>";
					return $alert;
			}
		}

		public function show_khuyenmai(){
			// $query="SELECT * FROM tbl_product order by productId desc";
			$query="
			SELECT* FROM tbl_khuyenmai order by KMId desc";//INNER JOIN là một cl sql có chức năng giao nhau giữa hai bản , như ở trên nó giao nhau và giống nhau ở id giữ 3 bản
			$result =$this->db->select($query);
			return $result;
		}
		public function update_khuyenmai($data,$id){
			$ten = mysqli_real_escape_string($this->db->link,$data['TKM']);
			$ngaybd = mysqli_real_escape_string($this->db->link,$data['NBD']);
			$ngaykt = mysqli_real_escape_string($this->db->link,$data['NKT']);
			
			if ($ten=="" || $ngaybd==""|| $ngaykt=="") {
				# code...
				$alert= "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query ="UPDATE  tbl_khuyenmai SET TKM='$ten' WHERE KMId='$id'";
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
		public function del_khuyenmai($id){
			$query="DELETE FROM tbl_khuyenmai WHERE KMId='$id'";
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
		public function getkhuyenmaibyid($id){
			$query="SELECT * FROM tbl_khuyenmai WHERE KMId='$id'";
			$result =$this->db->select($query);
			return $result;
		}
	}
?>
