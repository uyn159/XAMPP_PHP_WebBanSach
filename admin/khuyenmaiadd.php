<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/khuyenmai.php' ?>
<?php
    $pd =new khuyenmai();//goi class trong file adminlogin
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {//bao mat       
        $insertkhuyenmai=$pd->insert_khuyenmai($_POST);//$files tai vi co hinh anh
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách khách hàng</h2>
        <div class="block">
        <?php  
            if (isset($insertkhuyenmai)) {
                echo $insertkhuyenmai;
            }
        ?>                  
         <form action="khuyenmaiadd.php" method="post" enctype="multipart/form-data"><!--Thêm ảnh -->
            <table class="form">
                <tr>
                    <td>
                        <label>Tên sự kiện</label>
                    </td>
                    <td>
                        <input type="text" name="TKM" placeholder="Nhập tên sự kiện..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày bắt đầu</label>
                    </td>
                    <td>
                        <input type="text" name="NKT" placeholder="Nhập ngày bắt đầu..." class="medium" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Ngày kết thúc</label>
                    </td>
                    <td>
                        <input type="text" name="NBD" placeholder="Nhập ngày kết thúc..." class="medium" />
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


