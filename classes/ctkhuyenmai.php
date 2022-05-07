<?php
	$filepath=realpath(dirname(__FILE__));  
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
	/**
	 * 
	 */ 
	class ctkhuyenmai
	{	
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();//lay du lieu
			$this->fm = new Format();	
		}
		public function insert_ctkhuyenmai($data)	
		{
			$percent = mysqli_real_escape_string($this->db->link,$data['percent']);
			$khuyenmai = mysqli_real_escape_string($this->db->link,$data['khuyenmai']);
			$product=mysqli_real_escape_string($this->db->link,$data['product']);
			
			if ($percent=="") {
				# code...
				$alert= "<span class='error'>Percent must be not empty</span>";
				return $alert;
			}else{
				$query ="INSERT INTO tbl_ctkhuyenmai(KMId,productId,percent) VALUES('$khuyenmai','$product','$percent')";
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

		public function show_ctkhuyenmai(){
			$query="
			SELECT tbl_ctkhuyenmai.*, tbl_khuyenmai.TKM,tbl_product.productName
			FROM tbl_ctkhuyenmai	INNER JOIN tbl_khuyenmai ON tbl_ctkhuyenmai.KMId = tbl_khuyenmai.KMId
									INNER JOIN tbl_product ON tbl_ctkhuyenmai.productId = tbl_product.productId
			order by tbl_ctkhuyenmai.ctkhuyenmaiId desc";//INNER JOIN là một cl sql có chức năng giao nhau giữa hai bản , như ở trên nó giao nhau và giống nhau ở id giữ 3 bản
			$result =$this->db->select($query);
			return $result;
		}
		public function update_ctkhuyenmai($data,$id){
			$percent = mysqli_real_escape_string($this->db->link,$data['percent']);
			$khuyenmai = mysqli_real_escape_string($this->db->link,$data['khuyenmai']);
			$product=mysqli_real_escape_string($this->db->link,$data['product']);
			
			if ($percent=="" || $khuyenmai==""|| $product=="") {
				# code...
				$alert= "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query ="UPDATE  tbl_ctkhuyenmai SET percent='$percent' WHERE ctkhuyenmaiId='$id'";
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
		public function del_ctkhuyenmai($id){
			$query="DELETE FROM tbl_ctkhuyenmai WHERE ctkhuyenmaiId='$id'";
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
		public function getctkhuyenmaibyid($id){
			$query="SELECT * FROM tbl_ctkhuyenmai WHERE ctkhuyenmaiId='$id'";
			$result =$this->db->select($query);
			return $result;
		}
	}
?>


		
		