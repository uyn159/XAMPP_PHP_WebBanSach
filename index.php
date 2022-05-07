<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
?>


<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
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
				<div class="grid_1_of_4 images_1_of_4" style="height: 550px;display: inline-grid;margin: 3px;">
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
			
    </div>
</div>
<?php
	include 'inc/footer.php';
  ?>