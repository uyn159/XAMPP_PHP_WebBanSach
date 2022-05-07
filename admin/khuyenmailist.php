<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/khuyenmai.php';?>

<?php
	$class =new khuyenmai();//goi class trong file adminlogin
    if (isset($_GET['delid'])) {//lay id
            $id=$_GET['delid'];
            $deletekhuyenmai=$class->del_khuyenmai($id); 
        }
?>
        <div class="grid_10" >
            <div class="box round first grid">
                <h2>Danh sách thông tin khách hàng</h2>
                <div class="block">
                <?php  
                    if (isset($deletekhuyenmai)) {
                        echo $deletekhuyenmai;
                    }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên khuyến mãi</th>
							<th>Ngày bắt đầu</th>
							<th>Ngày kết thúc</th>
							<th>Sửa / Xóa</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$show=$class->show_khuyenmai();
						if ($show) {
							# code...
							$i=0;//số thứ tự
							while ($result=$show->fetch_assoc()) {
								# code...
							$i++;
						
						  ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['TKM']; ?></td>
							<td><?php echo $result['NBD']; ?></td>
							<td><?php echo $result['NKT']; ?></td>

							<td><a href="khuyenmaiedit.php?khuyenmaiid=<?php echo $result['KMId']  ?>">Edit</a> || <a onclick="return confirm('Are you want to Delete!!')" href="?delid=<?php echo $result['KMId']  ?>">Delete</a></td>
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

