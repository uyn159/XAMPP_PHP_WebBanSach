<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
				$get_number1=$product->get_number1();
				if ($get_number1) {
					# code...
					while ($resultnumber1=$get_number1->fetch_assoc()) {
						# code...
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php"> <img src="admin/uploads/<?php echo $resultnumber1['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p><?php echo $resultnumber1['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultnumber1['productId'] ?>">Add to cart</a></span></div>
				   </div>
			    </div>
			    <?php
			    	}
			    }
			    ?>			
				<?php
				$get_number2=$product->get_number2();
				if ($get_number2) {
					# code...
					while ($resultnumber2=$get_number2->fetch_assoc()) {
						# code...
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php"> <img src="admin/uploads/<?php echo $resultnumber2['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p><?php echo $resultnumber2['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultnumber2['productId']?>">Add to cart</a></span></div>
				   </div>
			    </div>
			    <?php
			    	}
			    }
			    ?>
			</div>
			<div class="section group">
				<?php
				$get_number3=$product->get_number3();
				if ($get_number3) {
					# code...
					while ($resultnumber3=$get_number3->fetch_assoc()) {
						# code...

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php"> <img src="admin/uploads/<?php echo $resultnumber3['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p><?php echo $resultnumber3['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultnumber3['productId'] ?>">Add to cart</a></span></div>
				   </div>
			    </div>
			    <?php
			    	}
			    }
			    ?>		
				<?php
				$get_number4=$product->get_number4();
				if ($get_number4) {
					# code...
					while ($resultnumber4=$get_number4->fetch_assoc()) {
						# code...

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php"> <img src="admin/uploads/<?php echo $resultnumber4['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p><?php echo $resultnumber2['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultnumber4['productId'] ?>">Add to cart</a></span></div>
				   </div>
			    </div>
			    <?php
			    	}
			    }
			    ?>
			</div>
		  <div class="clear"></div>
		</div>
			<div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				</div>
	     	</section>
			<!-- FlexSlider -->
	    	</div>
	  	<div class="clear"></div>
 </div>	