<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/dangky.php';?>

<?php
	$class =new user();//goi class trong file adminlogin
    if (isset($_GET['delid'])) {//lay id
            $id=$_GET['delid'];
            $deleteuser=$class->del_user($id); 
        }
?>
        <div class="grid_10" >
            <div class="box round first grid">
                <h2>Danh sách thông tin khách hàng</h2>
                <div class="block">
                <?php  
                    if (isset($deleteuser)) {
                        echo $deleteuser;
                    }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>User</th>
							<th>User Name</th>
							<th>Password</th>
							<th>Sửa / Xóa</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$show=$class->show_user();
						if ($show) {
							# code...
							$i=0;//số thứ tự
							while ($result=$show->fetch_assoc()) {
								# code...
							$i++;
						
						  ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['username']; ?></td>
							<td><?php echo $result['user']; ?></td>
							<td><?php echo $result['userpass']; ?></td>

							<td><a href="dangkyedit.php?userid=<?php echo $result['userId']  ?>">Edit</a> || <a onclick="return confirm('Are you want to Delete!!')" href="?delid=<?php echo $result['userId']  ?>">Delete</a></td>
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

