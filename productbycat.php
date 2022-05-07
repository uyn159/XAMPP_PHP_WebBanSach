<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php

    $pd=new product();
        if (!isset($_GET['catid']) || $_GET['catid']==NULL ) {//lay id
        echo "<script>window.location='404.php'</script>";
        }
        else{
            $id=$_GET['catid'];
        }
  
    // if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {//bao mat       
    //     $updateProduct=$pd->update_product($_POST,$_FILES,$id);//$files tai vi co hinh anh
    // }
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<?php
	      	$name_cat=$cat->get_name_by_cate($id); 
	      	if ($name_cat) {
	      		# code...
	      		while ($result_name=$name_cat->fetch_assoc()) {
	      			# code...
	      	?>
    		<h3>Category :<?php echo $result_name['catName'] ?></h3>
    		</div>
    	 	
    		<div class="clear"></div>
    	</div>
    	<?php }} ?>
	      <div class="section group">
	      	<?php
	      	$productbycat=$cat->get_product_by_cate($id); 
	      	if ($productbycat) {
	      		# code...
	      		while ($result=$productbycat->fetch_assoc()) {
	      			# code...
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result['image']?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],50B); ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result['price']).' '.'VNĐ' ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
				</div>
				<?php
				}
			}else{
	      		echo 'Category Not Avaiable';
	      	}
				?>
			</div>
	    </div>
 </div>
<?php
	include 'inc/footer.php';
?>