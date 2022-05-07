<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/NCC.php';?>
<?php
	$NCC =new NCC();//goi class trong file adminlogin
    if (isset($_GET['delid'])) {//lay id
            $id=$_GET['delid'];
            $deleteNCC=$NCC->del_NCC($id); 
        }
?>
        <div class="grid_10" >
            <div class="box round first grid">
                <h2>Danh sách loại ngôn ngữ</h2>
                <div class="block">
                <?php  
                    if (isset($deleteNCC)) {
                        echo $deleteNCC;
                    }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Tên nhà cung cấp</th>
							<th>Địa chỉ </th>
							<th>SĐT</th>
							<th>Sửa / Xóa</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$show=$NCC->show_NCC();
						if ($show) {
							# code...
							$i=0;//số thứ tự
							while ($result=$show->fetch_assoc()) {
								# code...
							$i++;
						
						  ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['NCCName']; ?></td>
							<td><?php echo $result['DCNCC']; ?></td>
							<td><?php echo $result['SDTNCC']; ?></td>
							<td><a href="NCCedit.php?NCCid=<?php echo $result['NCCId']  ?>">Edit</a> || <a onclick="return confirm('Are you want to Delete!!')" href="?delid=<?php echo $result['NCCId']  ?>">Delete</a></td>
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

