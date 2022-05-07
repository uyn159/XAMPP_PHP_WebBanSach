<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php 
 		$login_check= Session::get('cs_id');
		if ($login_check==false) {
			header('Location:login.php');
		}//dành cho trường hợp biết đường dẫn
?>	
<style>
    h3.payment{
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        text-decoration: underline;
    }
    .wrapper_method{
        text-align: center;
        width: 550px;
        margin: 0px auto;
        border: 1px solid #666;
        padding: 20px;
    }
    .wrapper_method a{
        padding: 5px;
        background: red;
        color:#fff;
    }
    .wrapper_method h3{
        margin-bottom: 20px;
    }
</style>
 <div class="main">
    <div class="content">
    	<div class="section group ">
    		<div class="content_top">
    		<div class="heading">
    		<h3>Payment Method</h3>
    		</div>
            <div class="clear"></div>
            <div class="wrapper_method">
            <h3 class="payment">Choose your method Payment</h3>
            <a class="payment" href="offlinepayment.php">Offline Payment</a>
            <a class="payment" href="onlinepayment.php">Online Payment</a>
            <a style="background: grey" href="cart.php"> << Previous</a>
    		</div>
    	</div>
    	<form action="" method="post">
    		
    	</form>
 		</div>
 	</div>
<?php
	include 'inc/footer.php';
  ?>