<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/dangky.php' ?>
<?php
    $pd=new user();
        if (!isset($_GET['userid']) || $_GET['userid']==NULL ) {//lay id
        echo "<script>window.location='dangkylist.php'</script>";//xét điều kiện trên thỏa thì sẽ trả về trang userlist không thì sẽ lấy được id
        }
        else{
            $id=$_GET['userid'];
        }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {//bao mat       
        $updateuser=$pd->update_user($_POST,$id);//$files tai vi co hinh anh
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa thông tin tài khoảng nhân viên</h2>
        <div class="block">
        <?php  
            if (isset($updateuser)) {
                echo $updateuser;
            }
        ?>                  
        <?php
            $getid=$pd->getuserbyid($id);
                if ($getid) {
                    # code...
                    while ($result_user=$getid->fetch_assoc()) {
                        # code...

        ?>
         <form action="" method="post" enctype="multipart/form-data"><!--Thêm ảnh -->
            <table class="form">
                <tr>
                    <td>
                        <label>Tên tài khoảng</label>
                    </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $result_user['username'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tài khoảng</label>
                    </td>
                    <td>
                        <input type="text" name="user" value="<?php echo $result_user['user'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Nhập mật khẩu mới</label>
                    </td>
                    <td>
                        <input type="text" name="userpass" value="<?php echo $result_user['userpass'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


