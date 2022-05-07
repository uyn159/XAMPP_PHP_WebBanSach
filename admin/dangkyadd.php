<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/dangky.php' ?>
<?php
    $pd =new user();//goi class trong file adminlogin
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {//bao mat       
        $Insertuser=$pd->insert_user($_POST);//$files tai vi co hinh anh
    }
?>
        <div class="grid_10" >
            <div class="box round first grid">
                <h2>Thêm tài khoảng nhân viên</h2>
                <div class="block copyblock">
                <?php  
                    if (isset($Insertuser)) {
                        echo $Insertuser;
                    }
                ?>
                 <form action="dangkyadd.php" method="post">
                    <table class="form">					
                        <tr>    
                            <td>
                                <input type="text" name="username" placeholder="Nhập tên tài khoảng ..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="user" placeholder="Nhập tài khoảng ..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="userpass" placeholder="Nhập mật khẩu ..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Thêm" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>