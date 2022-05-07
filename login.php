<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php 
	echo $login_check= Session::get('cs_lg');
		if ($login_check) {
		# code...
		header('Location:order.php');
		}
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {//bao mat       
        $insertCustomer=$cs->insert_customers($_POST);
    }
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['login'])) {//bao mat       
        $loginCustomer=$cs->login_customers($_POST);
    }
?>
<style type="text/css">
	.register_account form input[type="password"], .register_account form select {
    font-size: 12px;
    color: #B3B1B1;
    padding: 8px;
    outline: none;
    margin: 5px 0;
    width: 340px;
}
</style>
 <div class="main">
    <div class="content">
    	<div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<?php  
            if (isset($loginCustomer)) {
                echo $loginCustomer;
            }
       		?> 
        	<form action="" method="POST" id="member">
               	<input type="text"  name="email" class="field" placeholder="Nhập email....">
                <input type="password" name="pass" class="field" placeholder="Nhập password"....>
               
                <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                <div class="buttons">
                	<div>
                		<input type="submit" name="login" class="grey" value="Sign In">
                	</div>
            	</div>
            </form>
        </div>
        <?php

        ?>
    	<div class="register_account">
    		<h3>Register New Account</h3>
    		<?php  
            if (isset($insertCustomer)) {
                echo $insertCustomer;
            }
       		?> 
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Nhập tên ..." >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Nhập thành phố ...">
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="NhậP số ngân hàng ...">
							</div>
							<div>
								<input type="text" name="email" placeholder="Nhập E-Mail ...">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Address">
						</div>
		    		<div>
						<select style="color: black; " id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Select a Country</option>         
							<option value="HCM">Tp HCM</option>
							<option value="HN">Hà Nội</option>
							<option value="KG">Kiên Giang</option>
							<option value="CM">Cà Mau</option>
							<option value="QN">Quảng Ngãi</option>
							<option value="H">Huế</option>
							<option value="VT">Vũng Tàu</option>
							<option value="DT">Đà Lạt</option>
							<option value="Khac">Khác</option>

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Nhập số điện thoại ...">
		          </div>
				  
				  <div>
					<input type="password" name="password" placeholder="Nhập mật khẩu ...">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   	<div class="search">
		   		<div>
		   			<input type="submit" name="submit"class="grey" value="Create Account">
		   		</div>
			</div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
	include 'inc/footer.php';
  ?>