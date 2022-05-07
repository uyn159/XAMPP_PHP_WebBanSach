<?php
	$filepath=realpath(dirname(__FILE__));  
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
	/**
	 * 
	 */ 
	class category
	{	
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();//lay du lieu
			$this->fm = new Format();	
		}
		public function insert_category($catName)
		{
			$catName = $this->fm->validation($catName);//goi ham ,validation kiem tra adminUsername co hop le hay khong
			$catName = mysqli_real_escape_string($this->db->link,$catName);//link chua cac host,name....,1 biến là dữ liệu 1 biến là connect với cơ sở dữ liệu
			if (empty($catName)) {// emty là kiểm tra rỗng
				# code...
				$alert= "<span class='error'>Catetory must be not empty</span>";
				return $alert;
			}else{
				$query ="INSERT INTO tbl_category(catName) VALUES('$catName')";
				$result=$this->db->insert($query);//chon va co quyen thuc thi de chon ra
				if ($result) {
					# code...
					$alert="<span class='success'>Insert Category Successfull</span>";
					return $alert;
				}else
					$alert="<span class='error'>Insert Category Not Success</span>";
					return $alert;
			}
		}
		public function show_category(){
			$query="SELECT * FROM tbl_category order by catId desc";//id giảm dần
			$result =$this->db->select($query);
			return $result;
		}
		public function update_category($catName,$id){
			$catName = $this->fm->validation($catName);//goi ham ,validation kiem tra adminUsername co hop le hay khong
			$catName = mysqli_real_escape_string($this->db->link,$catName);//link chua cac host,name....
			$id = mysqli_real_escape_string($this->db->link,$id);
			if (empty($catName)) {// emty là kiểm tra rỗng
				# code...
				$alert= "<span class='error'>Catetory must be not empty</span>";
				return $alert;
			}else{
				$query ="UPDATE  tbl_category SET catName='$catName' WHERE catId='$id'";
				$result=$this->db->update($query);//chon va co quyen thuc thi
				if ($result) {
					# code...
					$alert="<span class='success'>Category Update Successfull</span>";
					return $alert;
				}else
					$alert="<span class='error'>Category Update Not Success</span>";
					return $alert;
			}			
		}
		public function del_category($id){
			$query="DELETE FROM tbl_category WHERE catId='$id'";
			$result =$this->db->delete($query);
			if ($result) {
					# code...
					$alert="<span class='success'>Category Deleted Successfull</span>";
					return $alert;
				}else
					$alert="<span class='error'>Category Deleted Not Success</span>";
					return $alert;
			return $result;
		}
		public function getcatbyid($id){
			$query="SELECT * FROM tbl_category WHERE catId='$id'";
			$result =$this->db->select($query);
			return $result;
		}
		public function show_category_fontend(){
			$query="SELECT * FROM tbl_category order by catId desc";//id giảm dần
			$result =$this->db->select($query);
			return $result;
		}
		public function get_product_by_cate($id){
			$query="SELECT * FROM tbl_product WHERE catId='$id' order by catId desc LIMIT 8";//id giảm dần
			$result =$this->db->select($query);
			return $result;
		}
		public function get_name_by_cate($id){
			$query="SELECT tbl_product.*,tbl_category.catName,tbl_category.catId FROM tbl_product,tbl_category WHERE tbl_product.catId=tbl_category.catId AND tbl_product.catId='$id' LIMIT 1";//id giảm dần
			$result =$this->db->select($query);
			return $result;
		}
	}
?>