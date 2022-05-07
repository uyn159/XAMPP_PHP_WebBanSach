<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php' ?>
<?php
    $pd =new product();//goi class trong file adminlogin
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {//bao mat       
        $insertProduct=$pd->insert_product($_POST,$_FILES);//$files tai vi co hinh anh
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm Sách</h2>
        <div class="block">
        <?php  
            if (isset($insertProduct)) {
                echo $insertProduct;
            }
        ?>                  
         <form action="nhanvienadd.php" method="post" enctype="multipart/form-data"><!--Thêm ảnh -->
            <table class="form">
                <tr>
                    <td>
                        <label>Tên sách </label>
                    </td>
                    <td>
                        <input type="text" name="CVNV" placeholder="Nhập tên của sách..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="HNV" placeholder="Nhập giá của sách..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Số lượng</label>
                    </td>
                    <td>
                        <input type="text" name="TNV" placeholder="Nhập số lượng của sách..." class="medium" />
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


