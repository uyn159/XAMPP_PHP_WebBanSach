<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/khuyenmai.php';?>
<?php include '../classes/cthoadon.php' ?>
<?php include_once '../helpers/format.php' ?>
<?php
		$pd= new cthoadon();
		$fm=new Format();
    if (isset($_GET['cthoadonid'])) {//lay id
            $id=$_GET['cthoadonid'];
            $deletecthoadon=$pd->del_cthoadon($id); 
        }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block"> 
        	<?php
        	if (isset($deletecthoadon)) {
        		# code...
        		echo $deletecthoadon;
        	}
        	?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Id</th>
					<th>Tên sách</th>
					<th>% giảm giá</th>
					<th>Giá gốc</th>
					<th>Sửa / Xóa</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$pdlist=$pd->show_cthoadon();
				if ($pdlist) {
					# code...
					$i=0;
					while ($result=$pdlist->fetch_assoc()) {
						# code...
						$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i;	?></td>
					<td><?php echo $result['productName'];?></td>
					<td><?php echo $result['percent'];?></td>
					<td><?php echo $result['price'];?></td>
					<td><a href="cthoadonedit.php?cthoadonid=<?php echo $result['cthoadonId'] ?>">Edit</a> || <a onclick="return confirm('Are you want to Delete!!')" href="?cthoadonid=<?php echo $result['cthoadonId'] ?>">Delete</a></td>
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
