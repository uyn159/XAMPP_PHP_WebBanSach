<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
        if (isset($_GET['orderid']) && $_GET['orderid']=='order' ) {
        	$customer_id= Session::get('cs_id');
        	$insertOrder=$ct->insertOrder($customer_id);
        	$insertOrder=$ct->insertHoaDon($customer_id);
        	$delCart=$ct->del_all_data_cart();
        	header('Location:success.php');
        }
        
?>
<style>
	.box_left{
		width: 50%;
		border: 1px solid #666;
		float: left;
		padding: 4px;
	}
	.box_right{
		width: 47%;
		border: 1px solid #666;
		float: right;
		padding: 4px;
	}
	a.a_order{ 
		background: red;
		padding: 5px 20px;
		color: #fff;
		font-size: 21px; 
	}
</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="heading">
    		<h3>Offline Payment</h3>
    		</div>
    		<div class="clear"></div>
    		<div class="box_left">
    			<div class="cartpage">
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
								<th width="5%">ID</th>
								<th width="25%">Product Name</th>
								<!-- <th width="10%">Image</th> -->
								<th width="25%">Price</th>
								<th width="10%">Quantity</th>
								<th width="30%">Total Price</th>
								<!-- <th width="10%">Action</th> -->
							</tr>
							<?php
							$getproductcart=$ct->get_product_cart();
							if ($getproductcart) {
								# code...
								$subtotal=0;
								$qty=0;	
								$i=0;
								while ($result=$getproductcart->fetch_assoc()) {
									# code...
									$i++;
							?>
							<tr>
								<td><?php echo $i;	?></td>
								<td><?php echo $result['productName']?></td>
								<td><?php echo $fm->format_currency($result['price']).' '.'VNĐ';?></td>
								<td>
										<?php echo $result['quantity']?><!-- "/> -->
									</form>
								</td>
								<td><?php
								$total=$result['price']*$result['quantity'];
								echo $fm->format_currency($total).' '.'VNĐ';
								 ?>								 	
								 </td>
							</tr>
							<?php
							$subtotal=$subtotal+$total;
							$qty=$qty + $result['quantity'];
								}
							}
							?>						
						</table>
						<?php
									$check_cart = $ct->check_cart();
									if ($check_cart) {
										# code...
									
						?>
						<table style="float:right;text-align:left;margin: 5px;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php

								echo $fm->format_currency($subtotal).' '.'VNĐ';
								Session::set('sum',$subtotal);	
								Session::set('qty',$qty);	
								?>
								</td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%(<?php echo $vat=$subtotal*0.1; ?>)</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php
								$vat=$subtotal*0.1;
								$go=$subtotal+$vat;
								echo $fm->format_currency($go).' '.'VNĐ' ;
								?></td>
							</tr>
					   </table>
					   <?php
					}else{
						echo 'Your Cart Is Empty!! Please Shopping NOW!!!';
						}
					?>
					</div>
    		</div>
    		<div class="box_right">
    			<table class="tblone">
    			<?php
    			$id=Session::get('cs_id');
    			$get_cs=$cs->show_customers($id);
    			if ($get_cs) {
    				# code...
    				while ($result = $get_cs->fetch_assoc()) {
    					# code...

    			?>
    			<tr>
    				<td>Name</td>
    				<td>:</td>
    				<td> <?php echo $result['name'] ?></td>
    			</tr>
    			<tr>
    				<td>Phone</td>
    				<td>:</td>
    				<td><?php echo $result['phone'] ?></td>
    			</tr>
    			<tr>
    				<td>Zipcode</td>
    		        <td>:</td>
    				<td><?php echo $result['zipcode'] ?></td>
    			</tr>
    			<tr>
    				<td>Email</td>
    				<td>:</td>
    				<td><?php echo $result['email'] ?></td>
    			</tr>
    			<tr>
    				<td>Address</td>
    				<td>:</td>
    				<td><?php echo $result['address'] ?></td>
    			</tr>
    			<?php
       				}
    			}
    			?>
    		</table>
    		</div>
 		</div>
	</div>
 		<center><a href="?orderid=order" class="a_order">Order Now</a></center><br>
 	</div>
 </form>
<?php
	include 'inc/footer.php';
  ?>