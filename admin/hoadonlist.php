<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/cart.php';?>
<?php include_once '../helpers/format.php';?>
<?php
	$fm = new Format();
	$ct =new cart();//goi class trong file adminlogin
    if (isset($_GET['delid'])) {//lay id
            $id=$_GET['delid'];
            $deletehoadon=$class->del_hoadon($id); 
        }
?>
        <div class="grid_10" >
            <div class="box round first grid">
                <h2>Danh sách hóa đơn</h2>
                <div class="block">
                <?php  
                    if (isset($deletehoadon)) {
                        echo $deletehoadon;
                    }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Admin</th>
							<th>Ngày in</th>
							<th>Tên Sản phẩm</th>
							<th>Image</th>
							<th>Số lượng</th>
							<th>Tổng giá</th>
							<th>Thông tin khách hàng</th>
							<!-- <th>Sửa / Xóa</th>-->					
							</tr>
					</thead>
					<tbody>
					<?php
						$get_inbox_cart=$ct->get_inbox_cartHD();
							if ($get_inbox_cart) {
								# code...
								$i=0; 
								while ($result=$get_inbox_cart->fetch_assoc()) {
									# code...
									$i++;	
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo Session::get('Name'); ?></td>
							<td><?php echo $fm->formatDate($result['date_order']) ?></td>
							<td><?php echo $result['productName'] ?></td>
							<td><img src="uploads/<?php echo $result['image'];	?>" width="80"></td>
							<td><?php echo $result['quantity'] ?></td>
							<td><?php echo $result['price'].' '.'VNĐ' ?></td>
							<td><a href="customer.php?customerid=<?php echo $result['customer_id'] ?>">Thông tin khách hàng</a></td>
							<!-- <td>
							<?php
									if ($result['status']==0) {
										# code...
							?>
									<a href="?shiftid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order']?>">Chờ xử lý...</a>
								
							<?php
									}elseif($result['status']==1){
							?>		
							<?php
									echo 'Đang giao...';
							?>
							<?php 
									}elseif($result['status']==2){
							?>
									<a href="?delid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order']?> ">Đã giao Remove</a>
							<?php
									}
							?>
							</td>
						</tr> -->
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

