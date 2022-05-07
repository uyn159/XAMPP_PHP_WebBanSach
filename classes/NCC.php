<?php  
	$filepath=realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
	/**
	 * 
	 */ 
	class NCC
	{	
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();//lay du lieu
			$this->fm = new Format();	
		}
		public function insert_NCC($data)
		{
			$NCCName = mysqli_real_escape_string($this->db->link,$data['NCCName']);
			$DCNCC = mysqli_real_escape_string($this->db->link,$data['DCNCC']);
			$SDTNCC = mysqli_real_escape_string($this->db->link,$data['SDTNCC']);
			if ($NCCName==""|| $DCNCC==""||$SDTNCC=="") {
				# code...
				$alert= "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				
				$query ="INSERT INTO tbl_NCC(NCCName,DCNCC,SDTNCC) VALUES('$NCCName','$DCNCC','$SDTNCC')";
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
		public function show_NCC(){
			$query="SELECT * FROM tbl_NCC order by NCCId desc";//id giảm dần
			$result =$this->db->select($query);
			return $result;
		}
		public function update_NCC($data,$id){
			
			$NCCName = mysqli_real_escape_string($this->db->link,$data['NCCName']);
			$DCNCC = mysqli_real_escape_string($this->db->link,$data['DCNCC']);
			$SDTNCC = mysqli_real_escape_string($this->db->link,$data['SDTNCC']);
			$id = mysqli_real_escape_string($this->db->link,$id);
			if (empty($NCCName)) {// emty là kiểm tra rỗng
				# code...
				$alert= "<span class='error'>NCC must be not empty</span>";
				return $alert;
			}else{
				$query ="UPDATE  tbl_NCC SET NCCName='$NCCName' WHERE NCCId='$id'";
				$result=$this->db->update($query);//chon va co quyen thuc thi
				if ($result) {
					# code...
					$alert="<span class='success'>NCC Update Successfull</span>";
					return $alert;
				}else
					$alert="<span class='error'>NCC Update Not Success</span>";
					return $alert;
			}			
		}
		public function del_NCC($id){
			$query="DELETE FROM tbl_NCC WHERE NCCId='$id'";
			$result =$this->db->delete($query);
			if ($result) {
					# code...
					$alert="<span class='success'>NCC Deleted Successfull</span>";
					return $alert;
				}else
					$alert="<span class='error'>NCC Deleted Not Success</span>";
					return $alert;
			return $result;
		}
		
		public function getNCCbyid($id){
			$query="SELECT * FROM tbl_NCC WHERE NCCId='$id'";
			$result =$this->db->select($query);
			return $result;
		}
	}
?>