<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
	if (isset($_GET['proid'])) {//lay id
		$customer_id=Session::get('cs_id');
            $proid=$_GET['proid'];
            $del_wish=$product->del_wish($proid,$customer_id); 
        }
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="width: 500px;">Wishlist Product</h2>

						<table class="tblone">
							<tr>
								<th width="10%">ID wishlist</th>
								<th width="20%">Product Name</th>
								<th width="20%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Action</th>
							</tr>
							<?php
							$customer_id=Session::get('cs_id');
							$get_wishlist=$product->get_wishlist($customer_id);
							if ($get_wishlist) {
								# code...
								$subtotal=0;
								$qty=0;	
								$i=0;
								while ($result=$get_wishlist->fetch_assoc()) {
									# code...
									$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result['image']?>" alt=""/></td>
								<td><?php echo $fm->format_currency($result['price']);?></td>
								
								
								<td><a href="?proid=<?php echo $result['productId']?>">Remove</a> ||
								<a href="details.php?proid=<?php echo $result['productId']?>">Buy now</a></td>
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
						
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
	include 'inc/footer.php';
  ?>