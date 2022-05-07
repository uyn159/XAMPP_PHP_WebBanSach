<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/khachhang.php' ?>
<?php
    $pd =new khachhang();//goi class trong file adminlogin
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {//bao mat       
        $insertkhachhang=$pd->insert_khachhang($_POST);//$files tai vi co hinh anh
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách khách hàng</h2>
        <div class="block">
        <?php  
            if (isset($insertkhachhang)) {
                echo $insertkhachhang;
            }
        ?>                  
         <form action="khachhangadd.php" method="post" enctype="multipart/form-data"><!--Thêm ảnh -->
            <table class="form">
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="name" placeholder="Nhập tên ..." >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Giới tính</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Chọn giới tính</option>
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                            <option value="2">Khác</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Thành phố</label>
                    </td>
                    <td>
                        <input type="text" name="city" placeholder="Nhập thành phố ...">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Địa chỉ</label>
                    </td>
                    <td>
                        <input type="text" name="address" placeholder="Address">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Mã thẻ NH</label>
                    </td>
                    <td>
                       <input type="text" name="zipcode" placeholder="Nhập số ngân hàng ...">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Nhập email</label>
                    </td>
                    <td>
                        <input type="text" name="email" placeholder="Nhập E-Mail ...">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Nhập số điện thoại</label>
                    </td>   
                    <td>
                         <input type="text" name="phone" placeholder="Nhập số điện thoại ...">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Nhập mật khẩu</label>
                    </td>
                    <td>
                        <input type="password" name="password" placeholder="Nhập mật khẩu ...">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Đất nước</label>
                    </td>
                    <td>
                        <select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
                            <option value="null">Select a Country</option>         
                            <option value="HCM">Việt Nam</option>
                            <option value="HN">Thailand</option>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
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


