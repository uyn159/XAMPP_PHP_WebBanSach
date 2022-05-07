<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/khuyenmai.php';?>
<?php include '../classes/ctkhuyenmai.php' ?>
<?php include_once '../helpers/format.php' ?>
<?php
		$pd= new ctkhuyenmai();
		$fm=new Format();
    if (isset($_GET['ctkhuyenmaiid'])) {//lay id
            $id=$_GET['ctkhuyenmaiid'];
            $deletectkhuyenmai=$pd->del_ctkhuyenmai($id); 
        }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block"> 
        	<?php
        	if (isset($deletectkhuyenmai)) {
        		# code...
        		echo $deletectkhuyenmai;
        	}
        	?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Id</th>
					<th>Tên chương trình</th>
					<th>Tên sách</th>
					<th>Số % giảm</th>
					<th>Sửa / Xóa</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$pdlist=$pd->show_ctkhuyenmai();
				if ($pdlist) {
					# code...
					$i=0;
					while ($result=$pdlist->fetch_assoc()) {
						# code...
						$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i;	?></td>
					<td><?php echo $result['TKM'];?></td>
					<td><?php echo $result['productName'];?></td>
					<td><?php echo $result['percent'];?></td>
					<td><a href="ctkhuyenmaiedit.php?ctkhuyenmaiid=<?php echo $result['ctkhuyenmaiId'] ?>">Edit</a> || <a onclick="return confirm('Are you want to Delete!!')" href="?ctkhuyenmaiid=<?php echo $result['ctkhuyenmaiId'] ?>">Delete</a></td>
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
