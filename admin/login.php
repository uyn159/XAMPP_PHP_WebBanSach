<?php
	include '../classes/adminlogin.php';
	include '../classes/userlogin.php';
 ?>
<?php
	$class =new adminlogin();
	$user=new userlogin();//goi class trong file adminlogin
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {//form gui du lieu bang post
		# code...
		$adminUser = $_POST['adminUser'];//tao biến lấy dữ liệu
		$adminPass = $_POST['adminPass'];
		
		$login_check=$class->login_admin($adminUser,$adminPass);//goi ham login_admin
		$loginuser_check=$user->userlogin($adminUser,$adminPass);
	}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Đăng nhập</h1>
			<span>
				<?php  
				if (isset($login_check)){
					echo $login_check;
				}
				?>
				<?php  
				if (isset($loginuser_check)){
					echo $loginuser_check;
				}
				?>
			</span>
			<div>
				<input type="text" placeholder="Username" name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password" name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>