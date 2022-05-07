<?php include 'inc/header2.php';?>
<?php include 'inc/sidebar2.php';?>
<?php 
	$filepath=realpath(dirname(__FILE__)); 
	include_once ($filepath.'/../classes/cart.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
    $ct =new cart();//goi class trong file adminlogin
    if (isset($_GET['shiftid'])) {//lay id
    	$id = $_GET['shiftid'];
    	$time = $_GET['time'];
    	$price = $_GET['price'];
    	$shifted=$ct->shifted($id,$time,$price);   
    }
    if (isset($_GET['delid'])) {//lay id
    	$id = $_GET['delid'];
    	$time = $_GET['time'];
    	$price = $_GET['price'];
    	$del_shifted=$ct->del_shifted($id,$time,$price);   
    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">  
                <?php 
                	if (isset($shifted)) {
                		# code...
                		echo $shifted;
                	}
                ?> 
                <?php 
                	if (isset($del_shifted)) {
                		# code...
                		echo $del_shifted;
                	}
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No.</th>
							<th>NV giao dịch</th>
							<th>Order Time</th>
							<th>Product</th>
							<th>Image</th>
							<th>Quantity</th>
							<th>Price</th>
							<!-- <th>Address</th> -->
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$ct = new cart();
						$fm = new Format();
						$get_inbox_cart=$ct->get_inbox_cart();
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
							<!-- <td><a href="customer.php?customerid=<?php echo $result['customer_id'] ?>">Thông tin khách hàng</a></td> -->
							<td>
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
<?php include 'inc/footer2.php';?>
