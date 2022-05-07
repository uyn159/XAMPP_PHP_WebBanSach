<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
	$brand =new brand();//goi class trong file adminlogin
    if (isset($_GET['delid'])) {//lay id
            $id=$_GET['delid'];
            $deletebrand=$brand->del_brand($id); 
        }
?>
        <div class="grid_10" >
            <div class="box round first grid">
                <h2>Danh sách loại ngôn ngữ</h2>
                <div class="block">
                <?php  
                    if (isset($deletebrand)) {
                        echo $deletebrand;
                    }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Tên loại</th>
							<th>Sửa / Xóa</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$show=$brand->show_brand();
						if ($show) {
							# code...
							$i=0;//số thứ tự
							while ($result=$show->fetch_assoc()) {
								# code...
							$i++;
						
						  ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['brandName']; ?></td>
							<td><a href="brandedit.php?brandid=<?php echo $result['brandId']  ?>">Edit</a> || <a onclick="return confirm('Are you want to Delete!!')" href="?delid=<?php echo $result['brandId']  ?>">Delete</a></td>
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

