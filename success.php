<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
        if (isset($_GET['orderid']) && $_GET['orderid']=='order' ) {
        	$customer_id= Session::get('cs_id');
        	$insertOrder=$ct->insertOrder($customer_id);
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
	.success{
		text-align: center;
		color: green;
		font-weight: bold;
	}
	p.success_note{
		text-align: center;
		padding: 8px;
		font-size: 17px;
	}
</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
			<h2 class="success">Success Order</h2>
			<?php
			$customer_id=Session::get('cs_id');
			$get_am=$ct->getAMPrice($customer_id);
			if ($get_am) {
				# code...
				$amount=0;
				while ($result=$get_am->fetch_assoc()) {
					# code...
					$price = $result['price'];
					$amount += $price;
				}
			}
			?>
			<p class="success_note">Tổng tiền bạn đã mua từ website của tôi : <?php $vat=$amount * 0.1;
			$total=$vat+$amount;
			 echo $total.' '.'VNĐ'; ?></p>
			<p class="success_note">Chúng tôi sẽ liên lạc với bạn sớm nhất. Làm ơn xem lại hóa đơn đã order tại đây<a href="orderdetails.php"> Click Here</a></p>    			
 		</div>
	</div>
</div>
 </form>
<?php
	include 'inc/footer.php';
  ?>