<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/nhanvien.php';?>

<?php
	$class =new nhanvien();//goi class trong file adminlogin
    if (isset($_GET['delid'])) {//lay id
            $id=$_GET['delid'];
            $deletenhanvien=$class->del_nhanvien($id); 
        }
?>
        <div class="grid_10" >
            <div class="box round first grid">
                <h2>Danh sách thông tin nhân viên</h2>
                <div class="block">
                <?php  
                    if (isset($deletenhanvien)) {
                        echo $deletenhanvien;
                    }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Họ</th>
							<th>Tên</th>
							<th>Ảnh</th>
							<th>Chức vụ</th>
							<th>Giới tính</th>
							<th>Ngày sinh</th>
							<th>SĐT</th>
							<th>CMND</th>
							<th>Lương </th>
							<th>Ngày BD</th>
							<th>TK NH</th>
							<th>Địa chỉ</th>
							<th>Sửa / Xóa</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$show=$class->show_nhanvien();
						if ($show) {
							# code...
							$i=0;//số thứ tự
							while ($result=$show->fetch_assoc()) {
								# code...
							$i++;
						
						  ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['HNV']; ?></td>
							<td><?php echo $result['TNV']; ?></td>
							<td><img src="uploadnv/<?php echo $result['image'];	?>" width="70"></td>
							<td><?php
							if ($result['type1']==1) {
								# code...
								echo 'Nhân viên';
							}elseif ($result['type1']==0) {
								# code...
								echo 'Quản lý';
							}
							else{
								echo 'khác';
							}
							?>
							</td>
							<td><?php
							if ($result['type']==1) {
								# code...
								echo 'Nam';
							}elseif ($result['type']==0) {
								# code...
								echo 'Nữ';
							}
							else{
								echo 'khác';
							}
							?>
							<td><?php echo $result['NSNV']; ?></td>
							<td><?php echo $result['SDTNV']; ?></td>
							<td><?php echo $result['CMNDNV']; ?></td>
							<td><?php echo $result['LNV']; ?></td>
							<td><?php echo $result['NBD']; ?></td>
							<td><?php echo $result['TKNHNV']; ?></td>
							<td><?php echo $result['DCNV']; ?></td>
							<td><a href="nhanvienedit.php?nhanvienid=<?php echo $result['NVId']  ?>">Edit</a> || <a onclick="return confirm('Are you want to Delete!!')" href="?delid=<?php echo $result['NVId']  ?>">Delete</a></td>
						</tr>
						<?php
							}
						}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

