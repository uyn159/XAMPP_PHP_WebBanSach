<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/NCC.php' ?>
<?php
    $pd =new NCC();//goi class trong file adminlogin
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {//bao mat       
        $insertNCC=$pd->insert_NCC($_POST);//$files tai vi co hinh anh
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm nhà cung cấp</h2>
        <div class="block">
        <?php  
            if (isset($insertNCC)) {
                echo $insertNCC;
            }
        ?>                  
         <form action="NCCadd.php" method="post" enctype="multipart/form-data"><!--Thêm ảnh -->
            <table class="form">
                <tr>
                    <td>
                        <label>Tên NCC</label>
                    </td>
                    <td>
                        <input type="text" name="NCCName" placeholder="Nhập tên của của nhà cung cấp..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Địa chỉ</label>
                    </td>
                    <td>
                        <input type="text" name="DCNCC" placeholder="Nhập địa chỉ của của nhà cung cấp..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Số điện thoại</label>
                    </td>
                    <td>
                        <input type="text" name="SDTNCC" placeholder="Nhập số điện thoại của của nhà cung cấp..." class="medium" />
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


