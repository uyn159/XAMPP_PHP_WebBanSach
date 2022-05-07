<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
?>

<?php
	$login_check= Session::get('cs_id');
	if($login_check==false){
		header('Location:login.php');
	}
	$ct=new cart();
	if (isset($_GET['confirmid'])) {//lay id
    	$id = $_GET['confirmid'];
    	$time = $_GET['time'];
    	$price = $_GET['price'];
    	$confirm=$ct->confirm($id,$time,$price);   
    }
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="width: 500px;">Your Detail Ordered</h2>
			    	<?php
			    	if (isset($update_quantity)) {
			    		# code...
			    		echo $update_quantity;
			    	}
			    	?>
			    	<?php
			    	if (isset($delcart)) {
			    		# code...
			    		echo $delcart;
			    	}
			    	?>
						<table class="tblone">
							<tr>
								<th width="10%">ID</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Quantity</th>
								<th width="15%">Date</th>
								<th width="10%">Status</th>
								<th width="10%">Action</th>
							</tr>
							<?php
							$customer_id= Session::get('cs_id');
							$get_cart_ordered=$ct->get_cart_ordered($customer_id);
							if ($get_cart_ordered) {
								# code...
								$qty=0;	
								$i=0;
								while ($result=$get_cart_ordered->fetch_assoc()) {
									# code...
									$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result['image']?>" alt=""/></td>
								<td><?php echo $result['price'];?></td>
								<td>
								<?php echo $result['quantity']?>

								</td>
									<td><?php echo $fm->formatDate($result['date_order'])?></td>
									<td>	
									 <?php
									 		if ($result['status']=='0') {
									 			# code...
									 			echo 'Chưa xử lý';
									 		}elseif($result['status']==1){
									?>		
											<span>Đã giao</span>
									<?php
									 		}elseif($result['status']==2){
									 			echo 'Hoàng tất';
									 		}
									 ?>
								</td>	
									<?php
											if ($result['status']=='0') {
						 					# code...
									?>
								<td>
									<?php 	echo 'N/A'; ?>
								</td>
				 					<?php
											}elseif($result['status']=='1'){
									?>
								<td><a href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['date_order']?>">Xác nhận đã lấy hàng</a></td>
									<?php
											}else{
									?>
								<td><?php echo 'Hoàng tất'; ?></td>
									<?php
										}	
									?>
							</tr>
							<?php
								}
							}
							?>

							
						</table>

					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
	include 'inc/footer.php';
  ?>