<?php
	$filepath=realpath(dirname(__FILE__));  
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
	/**
	 * 
	 */ 
	class cthoadon
	{	
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();//lay du lieu
			$this->fm = new Format();	
		}
		public function insert_cthoadon($data)	
		{
			$product=mysqli_real_escape_string($this->db->link,$data['product']);
			
			if ($product=="") {
				# code...
				$alert= "<span class='error'>Percent must be not empty</span>";
				return $alert;
			}else{
				$query ="INSERT INTO tbl_cthoadon(productId) VALUES('$product')";
				$result=$this->db->insert($query);//chon va co quyen thuc thi de chon ra
				if ($result) {
					# code...
					$alert="<span class='success'>Success</span>";
					return $alert;
				}else
					$alert="<span class='error'>Error</span>";
					return $alert;
			}
			$query="SELECT * FROM tbl_cthoadon WHERE productId='$productId'";
			$get_product=$this->db->select($query);
			if ($get_product) {
				# code...
				while ($result = $get_product->fetch_assoc()) {
					# code...
					$productId=$result['productId'];
					$productName=$result['productName'];
					$quantity=$result['quantity'];
					$price=$result['price']*$quantity;
					$image=$result['image'];
					$customer_id=$customer_id;
					$query_order ="INSERT INTO tbl_order(productId,productName,quantity,price,image,customer_id) VALUES('$productId','$productNa
					me','$quantity','$price','$image','$customer_id')";
					$insert_order=$this->db->insert($query_order);
				}
			}
		}

		public function show_cthoadon(){
			$query="
			SELECT tbl_cthoadon.*, tbl_khuyenmai.TKM,tbl_product.productName,tbl
			FROM tbl_cthoadon	INNER JOIN tbl_khuyenmai ON tbl_cthoadon.KMId = tbl_khuyenmai.KMId
									INNER JOIN tbl_product ON tbl_cthoadon.productId = tbl_product.productId
			order by tbl_cthoadon.cthoadonId desc";//INNER JOIN là một cl sql có chức năng giao nhau giữa hai bản , như ở trên nó giao nhau và giống nhau ở id giữ 3 bản
			$result =$this->db->select($query);
			return $result;
		}
	}
?>


		
		