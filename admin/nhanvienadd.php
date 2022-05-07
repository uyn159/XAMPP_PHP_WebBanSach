<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/nhanvien.php' ?>
<?php
    $pd =new nhanvien();//goi class trong file adminlogin
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {//bao mat       
        $insertnhanvien=$pd->insert_nhanvien($_POST,$_FILES);//$files tai vi co hinh anh
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm Sách</h2>
        <div class="block">
        <?php  
            if (isset($insertnhanvien)) {
                echo $insertnhanvien;
            }
        ?>                  
         <form action="nhanvienadd.php" method="post" enctype="multipart/form-data"><!--Thêm ảnh -->
            <table class="form">
                <tr>
                    <td>
                        <label>Họ nhân viên</label>
                    </td>
                    <td>
                        <input type="text" name="HNV" placeholder="Nhập họ nhân viên..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tên nhân viên</label>
                    </td>
                    <td>
                        <input type="text" name="TNV" placeholder="Nhập tên sản phẩm..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Upload ảnh </label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Chức vụ</label>
                    </td>
                    <td>
                        <select id="select" name="type1">
                            <option>Chọn chức vụ</option>
                            <option value="2">Khác</option>
                            <option value="1">Nhân viên</option>
                            <option value="0">Quản lý</option>
                        </select>
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
                        <label>Ngày sinh</label>
                    </td>
                    <td>
                        <input type="DATE" name="NSNV" placeholder="Nhập ngày tháng năm sinh..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Số điện thoại</label>
                    </td>
                    <td>
                        <input type="text" name="SDTNV" placeholder="Nhập số điện thoại nhân viên..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Chứng minh nhân dân</label>
                    </td>
                    <td>
                        <input type="text" name="CMNDNV" placeholder="Nhập chứng minh nhân dân..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Lương</label>
                    </td>
                    <td>
                        <input type="text" name="LNV" placeholder="Nhập tên sản phẩm..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày bắt đầu</label>
                    </td>
                    <td>
                        <input type="DATE" name="NBD" placeholder="Nhập ngày bắt đầu làm việc..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tài khoảng ngân hàng</label>
                    </td>
                    <td>
                        <input type="text" name="TKNHNV" placeholder="Nhập tài khoảng nh nhân viên..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Địa chỉ</label>
                    </td>
                    <td>
                        <input type="text" name="DCNV" placeholder="Nhập địa chỉ của nhân viên..." class="medium" />
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


