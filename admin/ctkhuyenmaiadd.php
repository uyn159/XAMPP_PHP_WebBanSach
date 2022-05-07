<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/khuyenmai.php';?>
<?php include '../classes/ctkhuyenmai.php' ?>
<?php
    $pd =new ctkhuyenmai();//goi class trong file adminlogin
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {//bao mat       
        $insertctkhuyenmai=$pd->insert_ctkhuyenmai($_POST);//$files tai vi co hinh anh
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm Sách</h2>
        <div class="block">
        <?php  
            if (isset($insertctkhuyenmai)) {
                echo $insertctkhuyenmai;
            }
        ?>                  
         <form action="ctkhuyenmaiadd.php" method="post" enctype="multipart/form-data"><!--Thêm ảnh -->
            <table class="form">
                <tr>
                    <td>
                        <label>Tên chương trình khuyến mãi</label>
                    </td>
                    <td>
                        <select id="select" name="khuyenmai">
                            <option>------Chọn chương trình------</option>
                            <?php
                                $km=new khuyenmai();
                                $khuyenmai= $km->show_khuyenmai();
                                if ($khuyenmai) {
                                    while ($result=$khuyenmai->fetch_assoc()) {
                                        # code...                                    
                                ?>
                            <option value="<?php echo $result['KMId']?>"><?php echo $result['TKM']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Chọn tên sách</label>
                    </td>
                    <td>
                        <select id="select" name="product">
                            <option>------Chọn tên sách------</option>
                            <?php
                                $cat=new product();
                                $catlist= $cat->show_product();
                                if ($catlist) {
                                    while ($result=$catlist->fetch_assoc()) {
                                        # code...                                    
                                ?>
                            <option value="<?php echo $result['productId']?>"><?php echo $result['productName']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Phần trăm giảm</label>
                    </td>
                    <td>
                        <input type="text" name="percent" placeholder="Nhập phần trăm giảm giá..." class="medium" />
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


