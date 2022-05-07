<?php  
	$filepath=realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
	/**
	 * 
	 */ 
	class brand
	{	
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();//lay du lieu
			$this->fm = new Format();	
		}
		public function insert_brand($brandName)
		{
			$brandName = $this->fm->validation($brandName);//goi ham ,validation kiem tra adminUsername co hop le hay khong
			$brandName = mysqli_real_escape_string($this->db->link,$brandName);//link chua cac host,name....,1 kết nối với sở dữ liệu, 1 lấy brand name
			if (empty($brandName)) {// emty là kiểm tra rỗng
				# code...
				$alert= "<span class='error'>Brand must be not empty</span>";
				return $alert;
			}else{
				$query ="INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
				$result=$this->db->insert($query);//chon va co quyen thuc thi de chon ra
				if ($result) {
					# code...
					$alert="<span class='success'>Insert Brand Successfull</span>";
					return $alert;
				}else
					$alert="<span class='error'>Insert Brand Not Success</span>";
					return $alert;
			}
		}
		public function show_brand(){
			$query="SELECT * FROM tbl_brand order by brandId desc";//id giảm dần, chọn tất cả các giá trị trong bản trên database
			$result =$this->db->select($query);
			return $result;
		}
		public function update_brand($brandName,$id){//$brandname và $id đã truyền thông qu php ở đầu trang
			$brandName = $this->fm->validation($brandName);//goi ham ,validation kiem tra adminUsername co hop le hay khong
			$brandName = mysqli_real_escape_string($this->db->link,$brandName);//link chua cac host,name....
			$id = mysqli_real_escape_string($this->db->link,$id);
			if (empty($brandName)) {// emty là kiểm tra rỗng
				# code...
				$alert= "<span class='error'>Brand must be not empty</span>";
				return $alert;
			}else{
				$query ="UPDATE  tbl_brand SET brandName='$brandName' WHERE brandId='$id'";
				$result=$this->db->update($query);//chon va co quyen thuc thi
				if ($result) {
					# code...
					$alert="<span class='success'>Brand Update Successfull</span>";
					return $alert;
				}else
					$alert="<span class='error'>Brand Update Not Success</span>";
					return $alert;
			}			
		}
		public function del_brand($id){
			$query="DELETE FROM tbl_brand WHERE brandId='$id'";
			$result =$this->db->delete($query);
			if ($result) {
					# code...
					$alert="<span class='success'>Brand Deleted Successfull</span>";
					return $alert;
				}else
					$alert="<span class='error'>Brand Deleted Not Success</span>";
					return $alert;
			return $result;
		}
		public function getbrandbyid($id){
			$query="SELECT * FROM tbl_brand WHERE brandId='$id'";
			$result =$this->db->select($query);
			return $result;
		}
	}
?>