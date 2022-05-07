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
<?php
        // if (!isset($_GET['proid']) || $_GET['proid']==NULL ) {
        // echo "<script>window.location='404.php'</script>";
        // }
        // else{
        //     $id=$_GET['proid'];
        // }
        // if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['save'])) {
        // 	# code...
        // 	$quantity=$_POST['quantity'];
        // 	$updatecustomers = $cs->update_customers($_POST,$id);
        // }
        
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    		<div class="heading">
    		<h3>Update Profile customer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<form action="" method="post">
    		<table class="tblone">
    			<?php
    			$id=Session::get('cs_id');
    			$get_cs=$cs->show_customers($id);
    			if ($get_cs) {
    				# code...
    				while ($result = $get_cs->fetch_assoc()) {
    					# code...

    			?>
    			<tr>
    				<td>Name</td>
    				<td>:</td>
    				<td> <?php echo $result['name'] ?></td>
    			</tr>
    			<!-- <tr>
    				<td>City</td>
    				<td>:</td>
    				<td><input type="text" name="city" value="<?php echo $result['name'] ?>"></td>
    			</tr> -->
    			<tr>
    				<td>Phone</td>
    				<td>:</td>
    				<td><?php echo $result['phone'] ?></td>
    			</tr>
    			<tr>
    				<td>Zipcode</td>
    		        <td>:</td>
    				<td><?php echo $result['zipcode'] ?></td>
    			</tr>
    			<tr>
    				<td>Email</td>
    				<td>:</td>
    				<td><?php echo $result['email'] ?></td>
    			</tr>
    			<tr>
    				<td>Address</td>
    				<td>:</td>
    				<td><?php echo $result['address'] ?></td>
    			</tr>
    			<tr>
    				<td colspan="3"><a href="editprofile.php">Update Profile</a></td>
    			</tr>
    			<?php
       				}
    			}
    			?>
    		</table>
    	</form>
 		</div>
 	</div>
<?php
	include 'inc/footer.php';
  ?>