<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/khachhang.php';?>

<?php
	$class =new khachhang();//goi class trong file adminlogin
    if (isset($_GET['delid'])) {//lay id
            $id=$_GET['delid'];
            $deletekhachhang=$class->del_khachhang($id); 
        }
?>
        <div class="grid_10" >
            <div class="box round first grid">
                <h2>Danh sách thông tin khách hàng</h2>
                <div class="block">
                <?php  
                    if (isset($deletekhachhang)) {
                        echo $deletekhachhang;
                    }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên khách hàng</th>
							<th>Địa chỉ</th>
							<th>Thành phố</th>
							<th>Quốc gia</th>
							<th>Mã ngân hàng</th>
							<th>Số điện thoại</th>
							<th>Email</th>
							<th>Sửa / Xóa</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$show=$class->show_khachhang();
						if ($show) {
							# code...
							$i=0;//số thứ tự
							while ($result=$show->fetch_assoc()) {
								# code...
							$i++;
						
						  ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['address']; ?></td>
							<td><?php echo $result['city']; ?></td>
							<td><?php echo $result['country']; ?></td>
							<td><?php echo $result['zipcode']; ?></td>
							<td><?php echo $result['phone']; ?></td>
							<td><?php echo $result['email']; ?></td>

							<td><a href="khachhangedit.php?khachhangid=<?php echo $result['id']  ?>">Edit</a> || <a onclick="return confirm('Are you want to Delete!!')" href="?delid=<?php echo $result['id']  ?>">Delete</a></td>
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

