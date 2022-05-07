	<?php
	    include_once 'lib/session.php';
	    Session::init();
	?>
	<?php
		include_once 'lib/database.php';
		include_once 'helpers/format.php';
		spl_autoload_register(function($classname){//tự động include theo tên class
			include_once "classes/".$classname.".php";
		});
		$db=new Database();
		$fm=new Format();
		$ct=new cart();
		
		$product=new product();
		$cat=new category();
		$cs=new customer();
	?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  	<div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="POST">
				    	<input type="text" placeholder="Tìm kiếm sản phẩm.." name="tukhoa" >
				    	<input type="submit" name="search_product" value="Tìm kiếm">
				    </form>
			    </div>
			    	<div class="shopping_cart">
						<div class="cart">
							<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">
								<?php
									$check_cart = $ct->check_cart();// nó sẽ bị lỗi nếu như xóa sản phẩm thì giá vẫn giữ nguyên do đó phải xét cho cùng phiên giao dịch()
									if ($check_cart) {
										# code...
									$sum=Session::get("sum");
									$qty=Session::get("qty");
										echo $fm->format_currency($sum).' '.'đ'.'-'.'Qty:'.$qty ;
									}else{
										echo 'Empty';
									}
								?></span>
							</a>
						</div>
			      	</div>
			      	<?php 
			      		if ( isset($_GET['cs_id'])) {
			      			# code...
			      			$customer_id=$_GET['cs_id'];
			      			$delCart=$ct->del_all_data_cart();//hiệu chỉnh giỏ hàng xóa tất cả khi đăng xuất
			      			$delCompare=$ct->del_compare($customer_id);
			      			Session::destroy();// sẽ xuất hiện lỗi mất sl bởi vì sẽ huy tất cả phiên giao dịch->trên
			      		}
			      	?>
		  			<div class="login">
		  				<?php 
		  					 $login_check= Session::get('cs_id');
		  					if ($login_check==false) {
		  						# code...
		  						echo '<a href="login.php">Login</a>
		  			</div>';
		  					}else{
		  						echo'<a href="?cs_id='.Session::get('cs_id').'">Logout</a>
		  			</div>';
		  					}
		  				?>
		  				
					<div class="clear"></div>
	 			</div>
	 	<div class="clear"></div>
 	</div>

<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a> </li>
	  <!-- <li><a href="topbrands.php">Top Brands</a></li> -->
<?php 
 		$check_cart= $ct->check_cart();
		if ($check_cart==true) {
			echo '<li><a href="cart.php">Cart</a></li>';
		}else{
			echo '';
		}
?>	  
<?php 	
		$customer_id= Session::get('cs_id');
 		$check_order= $ct->check_order($customer_id);
		if ($check_order==true) {
			echo '<li><a href="orderdetails.php">Ordered</a></li>';
		}else{
			echo '';
		}
?>	  
<?php 
 		$login_check= Session::get('cs_id');
		if ($login_check==false) {
			echo '';
		}else{
			echo '<li><a href="profile.php">Profile</a></li>';
		}
?>	  
<!-- <?php 
 		$login_check= Session::get('cs_id');
		if ($login_check==false) {
			echo '';
		}else{
			echo '<li><a href="compare.php">Compare</a> </li>';
		}
?>	 
<?php 
 		$login_check= Session::get('cs_id');
		if ($login_check==false) {
			echo '';
		}else{
			echo '<li><a href="wishlist.php">Wishlist</a> </li>';
		}
?>	 --> 
	  
	<!--   <li><a href="contact.php">Contact</a> </li> -->
	  <div class="clear"></div>
	</ul>
</div>