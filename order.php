<?php
	include 'inc/header.php';
?>
<?php 
	$login_check= Session::get('cs_lg');
		if ($login_check==false) {
		# code...
		header('Location:login.php');
		}
?>
<style >
	.not_found{
		text-align: center;
		font-size: 30px;
		font-weight: bold;
		color: Green;
}
</style>
<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			<div class="not_found">
				<h3>Order page</h3>	
			</div>
			
    		</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
	include 'inc/footer.php';
  ?>