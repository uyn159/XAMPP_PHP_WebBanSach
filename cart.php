<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
	if (isset($_GET['cartid'])) {//lay id
            $cartid=$_GET['cartid'];
            $delcart=$ct->del_product_cart($cartid); 
        }
	if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['submit'])) {
        	# code...
		$cartId=$_POST['cartId'];
        	$quantity=$_POST['quantity'];
        	$update_quantity = $ct->update_quantity($quantity,$cartId);
        if ($quantity<=0) {
        	$delcart=$ct->del_product_cart($cartId);
        }
    }
?>
<?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'";//mượt hơn trong việc mua sản phẩm tự động refresh
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
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
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php
							$getproductcart=$ct->get_product_cart();
							if ($getproductcart) {
								# code...
								$subtotal=0;
								$qty=0;	
								
								while ($result=$getproductcart->fetch_assoc()) {
									# code...
							?>
							<tr>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result['image']?>" alt=""/></td>
								<td><?php echo $fm->format_currency($result['price']);?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?php echo $result['cartId']?>"/><!--update số lượng dựa trên catId-->
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity']?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php
								$total=$result['price']*$result['quantity'];
								echo $fm->format_currency($total).' '.'VNĐ';
								 ?>
								 	
								 </td>
								<td><a onclick="return confirm('Are you want to Delete!!')" href="?cartid=<?php echo $result['cartId']?>">Xóa</a></td>
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
						<table style="float:right;text-align:left;" width="40%">
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
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php
								$vat=$subtotal*0.1;
								$go=$subtotal+$vat;
								echo $fm->format_currency($go).' '.'VNĐ';
								?></td>
							</tr>
					   </table>
					   <?php
					}else{
						echo 'Your Cart Is Empty!! Please Shopping NOW!!!';
						}
					?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php" style="padding: 5px;
    					background: black;
    					border-radius: 10%;
    					color: white;">Tiếp tục mua hàng</a>
						</div>
						<div class="shopright">
							<a href="payment.php" style="padding: 5px;
    					background: black;
    					border-radius: 10%;
    					color: white;">Thanh toán</a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
	include 'inc/footer.php';
  ?>