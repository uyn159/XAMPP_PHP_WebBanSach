<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
        if (!isset($_GET['proid']) || $_GET['proid']==NULL ) {//lay id
        echo "<script>window.location='404.php'</script>";//xét điều kiện trên thỏa thì sẽ trả về trang productlist không thì sẽ lấy được id
        }
        else{
            $id=$_GET['proid'];
        }
		$customer_id=Session::get('cs_id');
        if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['compare'])) {
        	# code...
        	$productid=$_POST['productid'];
        	$insertcompare= $product->insert_Compare($productid,$customer_id);
        }
        if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['wishlist'])) {
        	# code...
        	$productid=$_POST['productid'];
        	$insertwishlist= $product->insert_Wishlist($productid,$customer_id);
        }
        if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['submit'])) {
        	# code...
        	$quantity=$_POST['quantity'];
        	$AddtoCart= $ct->add_to_cart($quantity,$id);
        }
?>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php
    			$get_product_details=$product->get_details($id);
    			if ($get_product_details) {
    				# code...
    				while ($result_details=$get_product_details->fetch_assoc()) {
    					# code...
 
    		?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_details['image']?>" alt="" />
					</div>
<!--Sản phẩm so sánh-->
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details['productName']  ?></h2>
					<p><?php echo $fm->textShorten($result_details['product_desc'],150 )?></p>					
					<div class="price">
						<p>Price: <span><?php echo $fm->format_currency($result_details['price'])." "."VNĐ"?></span></p>
						<p>Category: <span><?php echo $result_details['catName']?></span></p>
						<p>Brand:<span><?php echo $result_details['brandName']?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="POST">
						<input type="number" class="buyfield" name="quantity" value="1" min="1" />
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						
					</form>	
					<?php
							if (isset($AddtoCart)) {
								# code...
								echo '<span style="color:red;font-size:16px;">Product Already Added</span>';
							}
						?>			
				</div>
				<div class="add-cart">
<!--Compare-->		<div class="button_details">
					
				</div>
				<div class="clear"></div>
				<p><?php
						if (isset($insertcompare)) {
							# code...
							echo $insertcompare;
						}
					?></p>
				<p><?php
						if (isset($insertwishlist)) {
							# code...
							echo $insertwishlist;
						}
					?></p>
				
			
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<?php echo $result_details['product_desc']?> 
	    </div>
				
	</div>
		<?php
				}
			}
		?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
					<?php
					$getall_category=$cat->show_category_fontend();
					if ($getall_category) {
						# code...
						while ($result_allcat = $getall_category->fetch_assoc()) {
							# code...
						
					?>
				      <li><a href="productbycat.php?catid=<?php echo $result_allcat['catId']?>"><?php echo $result_allcat['catName'] ?></a></li>
    				</ul>
    				<?php
    						}
						}
    				?>
 				</div>
 		</div>
 	</div>
<?php
	include 'inc/footer.php';
  ?>