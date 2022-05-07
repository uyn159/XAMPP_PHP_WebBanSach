<?php
	include 'inc/header.php';
	
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from Iphone</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
			$product_feathered=$product->get_all_product_pl();
				if ($product_feathered) {
					# code...
					while ($result=$product_feathered->fetch_assoc()) {
						# code...
			?>
				<div class="grid_1_of_4 images_1_of_4" style="height: 555px;display: inline-grid;margin: 3px;">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName']?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],50) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result['price'])." "."VNĐ"?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']?>" class="details">Details</a></span></div>
				</div>
			<?php
					}
				}
			?>

			</div>
			<div style="text-align: center; margin-top:15px; ">
				<?php
				$product_all=$product->get_all_product();
				$product_count=mysqli_num_rows($product_all);
				$product_button=$product_count/8;
				$i=0;
				// echo '<p>Trang : </p>';
				for ($i=1; $i <=$product_button ; $i++) { 
					# code...
					echo '<a style="
					margin-right:15px;
					padding: 5px;
					font-weight:bold;
    				border-radius: 25%;
    				background: black;
    				color: white;
    				" href="products.php?trang='.$i.'">'.$i.'</a>';
				}
				?>
			</div>
			<!-- <div class="content_bottom">
    		<div class="heading">
    		<h3>Latest from Acer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="images/new-pic1.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$403.66</span></p>
				    
				     <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview-4.php"><img src="images/new-pic2.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$621.75</span></p>
				     <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview-2.php"><img src="images/feature-pic2.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$428.02</span></p>
				     <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
				 <img src="images/new-pic3.jpg" alt="" />
					 <h2>Lorem Ipsum is simply </h2>					 
					 <p><span class="price">$457.88</span></p>   
				     <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
				</div>
			</div> -->
    </div>
 </div>
<?php
	include 'inc/footer.php';
  ?>

