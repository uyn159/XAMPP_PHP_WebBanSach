<?php
	$filepath=realpath(dirname(__FILE__));  
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
	/**
	 * 
	 */ 
	class nhanvien
	{	
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();//lay du lieu
			$this->fm = new Format();	
		}
		public function insert_nhanvien($data,$files)	
		{
			$ho = mysqli_real_escape_string($this->db->link,$data['HNV']);
			$ten = mysqli_real_escape_string($this->db->link,$data['TNV']);
			$chucvu = mysqli_real_escape_string($this->db->link,$data['type1']);
			$gioitinh = mysqli_real_escape_string($this->db->link,$data['type']);
			$ngaysinh = mysqli_real_escape_string($this->db->link,$data['NSNV']);
			$sdt = mysqli_real_escape_string($this->db->link,$data['SDTNV']);
			$cmnd = mysqli_real_escape_string($this->db->link,$data['CMNDNV']);
			$luong = mysqli_real_escape_string($this->db->link,$data['LNV']);
			$ngaybd = mysqli_real_escape_string($this->db->link,$data['NBD']);
			$tknh = mysqli_real_escape_string($this->db->link,$data['TKNHNV']);
			$diachi = mysqli_real_escape_string($this->db->link,$data['DCNV']);
			$permited=array('jpg', 'jpeg', 'png', 'gif');
			$file_name=$_FILES['image']['name'];
			$file_size=$_FILES['image']['size'];
			$file_temp=$_FILES['image']['tmp_name'];

			$div=explode('.', $file_name);
			$file_ext=strtolower(end($div));
			$unique_image=substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image="uploadnv/".$unique_image;
			if ($ho=="" || $ten==""  || $chucvu=="" || $gioitinh=="" || $ngaysinh=="" || $sdt==""|| $cmnd==""||$ngaybd==""||$luong=="" ||$tknh=="" ||$diachi==""||$file_name=="") {
				# code...
				$alert= "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp,$uploaded_image);
				$query ="INSERT INTO tbl_nhanvien(HNV,TNV,type1,type,NSNV,SDTNV,CMNDNV,LNV,NBD,TKNHNV,DCNV,image) VALUES('$ho','$ten','$chucvu','gioitinh','$ngaysinh','$sdt','$cmnd','$luong','$ngaybd','$tknh','$diachi','$unique_image')";
				$result=$this->db->insert($query);//chon va co quyen thuc thi de chon ra
				if ($result) {
					# code...
					$alert="<span class='success'>Th??m nh??n vi??n th??nh c??ng</span>";
					return $alert;
				}else
					$alert="<span class='error'>Th??m nh??n vi??n kh??ng th??nh c??ng</span>";
					return $alert;
			}
		}

		public function show_nhanvien(){
			// $query="SELECT * FROM tbl_product order by productId desc";
			$query="SELECT* FROM tbl_nhanvien order by NVId desc";//INNER JOIN l?? m???t cl sql c?? ch???c n??ng giao nhau gi???a hai b???n , nh?? ??? tr??n n?? giao nhau v?? gi???ng nhau ??? id gi??? 3 b???n
			$result =$this->db->select($query);
			return $result;
		}
		public function update_nhanvien($data,$files,$id){
			$ho = mysqli_real_escape_string($this->db->link,$data['HNV']);
			$ten = mysqli_real_escape_string($this->db->link,$data['TNV']);
			$chucvu = mysqli_real_escape_string($this->db->link,$data['type1']);
			$gioitinh = mysqli_real_escape_string($this->db->link,$data['type']);
			$ngaysinh = mysqli_real_escape_string($this->db->link,$data['NSNV']);
			$sdt = mysqli_real_escape_string($this->db->link,$data['SDTNV']);
			$cmnd = mysqli_real_escape_string($this->db->link,$data['CMNDNV']);
			$luong = mysqli_real_escape_string($this->db->link,$data['LNV']);
			$ngaybd = mysqli_real_escape_string($this->db->link,$data['NBD']);
			$tknh = mysqli_real_escape_string($this->db->link,$data['TKNHNV']);
			$diachi = mysqli_real_escape_string($this->db->link,$data['DCNV']);
			$permited=array('jpg', 'jpeg', 'png', 'gif');
			$file_name=$_FILES['image']['name'];
			$file_size=$_FILES['image']['size'];
			$file_temp=$_FILES['image']['tmp_name'];

			$div=explode('.', $file_name);
			$file_ext=strtolower(end($div));
			$unique_image=substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image="uploadnv/".$unique_image;
			if ($ho=="" || $ten==""  || $chucvu=="" || $gioitinh=="" || $ngaysinh=="" || $sdt==""|| $cmnd==""||$ngaybd==""||$luong=="" ||$tknh=="" ||$diachi=="") {
				# code...
				$alert= "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				if(!empty($file_name)){//ng?????i d??ng ch???n ???nh
				if ($file_size>204800000000 ) //quy ?????nh size ???nh ph?? h???p 
				{
					# code...
					$alert= "<span class='error'>Image Size should be less then 1MB!!!!!</span>";
					return $alert;
				}
				elseif (in_array($file_ext, $permited)==false) //file_ext=jpg ni???u nh???p kh??c file ???nh
				{
					# code...
					$alert= "<span class='error'>You Can Upload Only:-".implode(',', $permited)."</span>";
					return $alert;
				}
				move_uploaded_file($file_temp,$uploaded_image);
				$query ="UPDATE  tbl_nhanvien SET
				HNV='$ten',
				TNV='$ho', 
				type1='$chucvu', 
				type='$gioitinh', 
				NSNV='$ngaysinh', 
				SDTNV='$sdt', 
				CMNDNV='$cmnd',
				LNV='$luong',
				NBD='$ngaybd',
				TKNHNV='$tknh',
				DCNV='$diachi', 
				image='$unique_image'
				WHERE NVId='$id'";
				
			}else{// kh??ng ch???n ???nh
				$query ="UPDATE  tbl_nhanvien SET

				HNV='$ten',
				TNV='$ho', 
				type1='$chucvu', 
				type='$gioitinh', 
				NSNV='$ngaysinh', 
				SDTNV='$sdt', 
				CMNDNV='$cmnd',
				LNV='$luong',
				NBD='$ngaybd',
				TKNHNV='$tknh',
				DCNV='$diachi'
				WHERE NVId='$id'";
			}
				$result=$this->db->update($query);//chon va co quyen thuc thi
				if ($result) {
					# code...
					$alert="<span class='success'>S???a th??ng tin th??nh c??ng</span>";
					return $alert;
				}else{
					$alert="<span class='error'>S???a th??ng tin kh??ng th??nh c??ng</span>";
					return $alert;
				}
			}			
		}
		public function del_nhanvien($id){
			$query="DELETE FROM tbl_nhanvien WHERE NVId='$id'";
			$result =$this->db->delete($query);
			if ($result) {
					# code...
					$alert="<span class='success'>Th??ng tin ???? x??a</span>";
					return $alert;
				}else
					$alert="<span class='error'>L???i</span>";
					return $alert;
			return $result;
		}
		public function getnhanvienbyid($id){
			$query="SELECT * FROM tbl_nhanvien WHERE NVId='$id'";
			$result =$this->db->select($query);
			return $result;
		}
	}
?>
