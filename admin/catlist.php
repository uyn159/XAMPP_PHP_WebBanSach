<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>

<?php
	$cat =new category();//goi class trong file adminlogin
    if (isset($_GET['delid'])) {//lay id
            $id=$_GET['delid'];
            $deleteCat=$cat->del_category($id); 
        }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách thể loại sách</h2>
                <div class="block">
                <?php  
                    if (isset($deleteCat)) {
                        echo $deleteCat;
                    }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Tên sách</th>
							<th>Sửa / Xóa</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$show=$cat->show_category();
						if ($show) {
							# code...
							$i=0;//số thứ tự
							while ($result=$show->fetch_assoc()) {
								# code...
							$i++;
						
						  ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['catName']; ?></td>
							<td><a href="catedit.php?catid=<?php echo $result['catId']  ?>">Edit</a> || <a onclick="return confirm('Are you want to Delete!!')" href="?delid=<?php echo $result['catId']  ?>">Delete</a></td>
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

