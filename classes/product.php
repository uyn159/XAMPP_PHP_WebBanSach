<?php
	$filepath=realpath(dirname(__FILE__));  
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
	/**
	 * 
	 */ 
	class product
	{	
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();//lay du lieu
			$this->fm = new Format();	
		}
		
		public function insert_product($data,$files)	
		{
			$productName = mysqli_real_escape_string($this->db->link,$data['productName']);//link chua cac host,name....,1 biến là dữ liệu 1 biến là connect với cơ sở dữ liệu
			$brand = mysqli_real_escape_string($this->db->link,$data['brand']);
			$ncc = mysqli_real_escape_string($this->db->link,$data['ncc']);
			$category = mysqli_real_escape_string($this->db->link,$data['category']);
			$product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
			$price = mysqli_real_escape_string($this->db->link,$data['price']);
			$type = mysqli_real_escape_string($this->db->link,$data['type']);
			//kiem tra hinh anh va cho hinh anh vao folder upload
			$permited=array('jpg', 'jpeg', 'png', 'gif');
			$file_name=$_FILES['image']['name'];
			$file_size=$_FILES['image']['size'];
			$file_temp=$_FILES['image']['tmp_name'];

			$div=explode('.', $file_name);
			$file_ext=strtolower(end($div));
			$unique_image=substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image="uploads/".$unique_image;
			if ($productName=="" || $brand==""  ||$ncc==""  || $category=="" || $product_desc=="" || $price=="" || $type=="" || $file_name=="") {
				# code...
				$alert= "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp,$uploaded_image);//mat dinh se lay ten cua file tEmp do va gui vao cai bien file temp sau do no se lay file tam do upload hinh anh vao folder UPLOADS
				$query ="INSERT INTO tbl_product(productName,brandId,catId,product_desc,price,type,image,NCCId) VALUES('$productName','$brand','$category','$product_desc','$price','$type','$unique_image','$ncc')";
				$result=$this->db->insert($query);//chon va co quyen thuc thi de chon ra
				if ($result) {
					# code...
					$alert="<span class='success'>Insert Product Successfull</span>";
					return $alert;
				}else
					$alert="<span class='error'>Insert Product Not Success</span>";
					return $alert;
			}
		}
		public function insert_slider($data,$files){
			$sliderName = mysqli_real_escape_string($this->db->link,$data['sliderName']);
			$type = mysqli_real_escape_string($this->db->link,$data['type']);
			
			//kiem tra hinh anh va cho hinh anh vao folder upload
			$permited=array('jpg', 'jpeg', 'png', 'gif');//cho phép những tên tiệp update ảnh
			$file_name=$_FILES['image']['name'];
			$file_size=$_FILES['image']['size'];
			$file_temp=$_FILES['image']['tmp_name'];//để upload hình ảnh

			$div=explode('.', $file_name);//khi gặp dấu chấm tách name và jpg ra
			$file_ext=strtolower(end($div));//tất cả thành  chữ thường ,end sẽ lấy cuối là jpg end=current sẽ lấy tên
			$unique_image=substr(md5(time()), 0, 10).'.'.$file_ext;//random số từ 0-10 ra name mới 
			$uploaded_image="uploads/".$unique_image;
			if ($sliderName=="" || $type=="") {
				# code...
				$alert= "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				if(!empty($file_name)){//người dùng chọn ảnh
				if ($file_size>204800000000 ) //quy định size ảnh phù hợp 
				{
					# code...
					$alert= "<span class='error'>Image Size should be less then 1MB!!!!!</span>";
					return $alert;
				}
				elseif (in_array($file_ext, $permited)==false) //file_ext=jpg niếu nhập khác file ảnh
				{
					# code...
					$alert= "<span class='error'>You Can Upload Only:-".implode(',', $permited)."</span>";
					return $alert;
				}
				move_uploaded_file($file_temp,$uploaded_image);
				$query ="INSERT INTO tbl_slider(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image')";
				$result=$this->db->update($query);//chon va co quyen thuc thi
				if ($result) {
					# code...
					$alert="<span class='success'>Slider Added Successfull</span>";
					return $alert;
				}else{
					$alert="<span class='error'>Slider Added Not Success</span>";
					return $alert;
					}
				}
			}
		}
		public function update_type_slider($id,$type){
			$type = mysqli_real_escape_string($this->db->link,$type);
			$query="UPDATE tbl_slider SET type='$type' WHERE sliderId='$id' ";
			$result=$this->db->update($query);
			return $result;
		}
		public function show_slider(){
			$query="SELECT * FROM tbl_slider WHERE type='1' order by sliderId desc";
			$result=$this->db->select($query);
			return $result;
		}public function show_slider_list(){
			$query="SELECT * FROM tbl_slider order by sliderId desc";
			$result=$this->db->select($query);
			return $result;
		}
		public function del_slider($id){
			$query="DELETE FROM tbl_slider WHERE sliderId='$id'";
			$result =$this->db->delete($query);
			if ($result) {
					# code...
					$alert="<span class='success'>Slider Deleted Successfull</span>";
					return $alert;
				}else
					$alert="<span class='error'>Slider Deleted Not Success</span>";
					return $alert;
			return $result;
		}
		public function show_product(){
			// $query="SELECT * FROM tbl_product order by productId desc";
			$query="
			SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName, tbl_NCC.NCCName
			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
							 INNER JOIN tbl_brand 	 ON tbl_product.brandId = tbl_brand.brandId
							 INNER JOIN tbl_NCC 	 ON tbl_product.NCCId = tbl_NCC.NCCId
			order by tbl_product.productId desc";//INNER JOIN là một cl sql có chức năng giao nhau giữa hai bản , như ở trên nó giao nhau và giống nhau ở id giữ 3 bản
			$result =$this->db->select($query);
			return $result;
		}
		public function update_product($data,$files,$id){
			$productName = mysqli_real_escape_string($this->db->link,$data['productName']);//link chua cac host,name....,1 biến là dữ liệu 1 biến là connect với cơ sở dữ liệu
			$brand = mysqli_real_escape_string($this->db->link,$data['brand']);
			$ncc = mysqli_real_escape_string($this->db->link,$data['ncc']);
			$category = mysqli_real_escape_string($this->db->link,$data['category']);
			$product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
			$price = mysqli_real_escape_string($this->db->link,$data['price']);
			$type = mysqli_real_escape_string($this->db->link,$data['type']);
			//kiem tra hinh anh va cho hinh anh vao folder upload
			$permited=array('jpg', 'jpeg', 'png', 'gif');//cho phép những tên tiệp update ảnh
			$file_name=$_FILES['image']['name'];
			$file_size=$_FILES['image']['size'];
			$file_temp=$_FILES['image']['tmp_name'];//để upload hình ảnh

			$div=explode('.', $file_name);//khi gặp dấu chấm tách name và jpg ra
			$file_ext=strtolower(end($div));//tất cả thành  chữ thường ,end sẽ lấy cuối là jpg end=current sẽ lấy tên
			$unique_image=substr(md5(time()), 0, 10).'.'.$file_ext;//random số từ 0-10 ra name mới 
			$uploaded_image="uploads/".$unique_image;
			if ($productName=="" || $brand==""  || $category=="" ||$ncc=="" || $product_desc=="" || $price=="" || $type=="") {
				# code...
				$alert= "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				if(!empty($file_name)){//người dùng chọn ảnh
				if ($file_size>204800000000 ) //quy định size ảnh phù hợp 
				{
					# code...
					$alert= "<span class='error'>Image Size should be less then 1MB!!!!!</span>";
					return $alert;
				}
				elseif (in_array($file_ext, $permited)==false) //file_ext=jpg niếu nhập khác file ảnh
				{
					# code...
					$alert= "<span class='error'>You Can Upload Only:-".implode(',', $permited)."</span>";
					return $alert;
				}
				move_uploaded_file($file_temp,$uploaded_image);
				$query ="UPDATE  tbl_product SET

				productName='$productName',
				brandId='$brand', 
				NCCId='$ncc', 
				catId='$category', 
				type='$type', 
				price='$price', 
				image='$unique_image', 
				product_desc='$product_desc' 
				WHERE productId='$id'";
				
			}else{// không chọn ảnh
				$query ="UPDATE  tbl_product SET

				productName='$productName',
				brandId='$brand', 
				NCCId='$ncc', 
				catId='$category', 
				type='$type', 
				price='$price', 
				product_desc='$product_desc'  
				WHERE productId='$id'";
			}
				$result=$this->db->update($query);//chon va co quyen thuc thi
				if ($result) {
					# code...
					$alert="<span class='success'>Product Update Successfull</span>";
					return $alert;
				}else{
					$alert="<span class='error'>Product Update Not Success</span>";
					return $alert;
				}
			}			
		}
		public function del_product($id){
			$query="DELETE FROM tbl_product WHERE productId='$id'";
			$result =$this->db->delete($query);
			if ($result) {
					# code...
					$alert="<span class='success'>Product Deleted Successfull</span>";
					return $alert;
				}else
					$alert="<span class='error'>Product Deleted Not Success</span>";
					return $alert;
			return $result;
		}
		public function getproductbyid($id){
			$query="SELECT * FROM tbl_product WHERE productId='$id'";
			$result =$this->db->select($query);
			return $result;
		}
		//END BACKEND
		//STA 
		public function getproduct_feathered(){
			$query="SELECT * FROM tbl_product WHERE type='1'";
			$result =$this->db->select($query);
			return $result;
		}
		public function getproduct_new(){//giới hạn sản phẩm mới trong trang index của sản phẩm
			$query="SELECT * FROM tbl_product order by  productId desc limit 4";
			$result =$this->db->select($query);
			return $result;
		}
		public function get_all_product_pl(){
			$sp_tungtrang=8;
			if (!isset($_GET['trang'])) {
				# code...
				$trang=1;
			}else{
				$trang=$_GET['trang'];
			}
			$tung_trang=($trang-1)*$sp_tungtrang;
			$query="SELECT * FROM tbl_product order by productId desc LIMIT $tung_trang,$sp_tungtrang";
			$result =$this->db->select($query);
			return $result;
		}
		public function get_all_product(){//giới hạn sản phẩm mới trong trang index của sản phẩm
			$query="SELECT * FROM tbl_product";
			$result =$this->db->select($query);
			return $result;
		}
		public function get_details($id){// lấy giá ,, tên thương hiệu và tên sản phẩm
			$query="
			SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
			INNER JOIN tbl_brand 	 ON tbl_product.brandId = tbl_brand.brandId WHERE tbl_product.productId='$id'";
			$result =$this->db->select($query);
			return $result;
		}
		public function get_number1(){// sản phẩm nổi bật của mỗi thương hiệu
			$query="SELECT * FROM tbl_product WHERE brandId='1' order by productId desc LIMIT 1";
			$result=$this->db->select($query);
			return $result;
		}
		public function get_number2(){
			$query="SELECT * FROM tbl_product WHERE brandId='2' order by productId desc LIMIT 1";
			$result=$this->db->select($query);
			return $result;
		}
		public function get_number3(){
			$query="SELECT * FROM tbl_product WHERE brandId='3' order by productId desc LIMIT 1";
			$result=$this->db->select($query);
			return $result;
		}
		public function get_number4(){
			$query="SELECT * FROM tbl_product WHERE brandId='4' order by productId desc LIMIT 1";
			$result=$this->db->select($query);
			return $result;
		}
		public function insert_Compare($productid,$customer_id){
			$productid = mysqli_real_escape_string($this->db->link,$productid);
			$customer_id=mysqli_real_escape_string($this->db->link,$customer_id);

			$check_compare="SELECT * FROM tbl_compare WHERE productId= '$productid' AND customer_id= '$customer_id'";
			$result_check_comepare=$this->db->select($check_compare);
			if ($result_check_comepare) {
				# code...
				$msg="<span style='color:red;'>Product already Added Compare</span";
				return $msg;
			}else{
			$query="SELECT * FROM tbl_product WHERE productId= '$productid'";
			$result=$this->db->select($query)->fetch_assoc();
			// echo '<pre>';
			// echo print_r($result);//IN dạng chuỗi 
			// echo '</pre>';
			$productName=$result['productName'];
			$price=$result['price'];
			$image=$result['image'];
			
			$query_insert ="INSERT INTO tbl_compare(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
				$insert_Compare=$this->db->insert($query_insert);//chon va co quyen thuc thi de chon ra
				if ($insert_Compare) {
					# code...
					$alert="<span class='success'>Added Compare Successfull</span>";
					return $alert;
				}else{
					$alert="<span class='error'>Added Compare not Successfull</span>";
					return $alert;
				}
			}
		}
		public function get_compare($customer_id){//so sánh sản phẩm trong compare
			$query="SELECT * FROM tbl_compare WHERE customer_id='$customer_id' order by id desc";
			$result=$this->db->select($query);
			return $result;
		}
		public function get_wishlist($customer_id){//so sánh sản phẩm trong compare
			$query="SELECT * FROM tbl_wishlist WHERE customer_id='$customer_id' order by id desc";
			$result=$this->db->select($query);
			return $result;
		}
		public function insert_Wishlist($productid,$customer_id){
			$productid = mysqli_real_escape_string($this->db->link,$productid);
			$customer_id=mysqli_real_escape_string($this->db->link,$customer_id);

			$check_wl="SELECT * FROM tbl_wishlist WHERE productId= '$productid' AND customer_id= '$customer_id'";
			$result_check_wl=$this->db->select($check_wl);
			if ($result_check_wl) {
				# code...
				$msg="<span style='color:red;'>Product already Added Wishlist</span";
				return $msg;
			}else{
			$query="SELECT * FROM tbl_product WHERE productId= '$productid'";
			$result=$this->db->select($query)->fetch_assoc();
			// echo '<pre>';
			// echo print_r($result);//IN dạng chuỗi 
			// echo '</pre>';
			$productName=$result['productName'];
			$price=$result['price'];
			$image=$result['image'];
			
			$query_insert ="INSERT INTO tbl_wishlist(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
				$insert_Compare=$this->db->insert($query_insert);//chon va co quyen thuc thi de chon ra
				if ($insert_Compare) {
					# code...
					$alert="<span class='success'>Added Wishlist Successfull</span>";
					return $alert;
				}else{
					$alert="<span class='error'>Added Wishlist not Successfull</span>";
					return $alert;
				}
			}
		}
		public function del_wish($proid,$customer_id){
			$query="DELETE FROM tbl_wishlist WHERE productId='$proid' AND customer_id='$customer_id'";
			$result =$this->db->delete($query);
			return $result;	
		}
		public function search_product($tukhoa){
			$tukhoa = $this->fm->validation($tukhoa);
			$query="SELECT * FROM tbl_product WHERE productName LIKE '%$tukhoa%' ";//id giảm dần
			$result =$this->db->select($query);
			return $result;
		}
	}
?>
 