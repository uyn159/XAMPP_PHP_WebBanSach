<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php' ?>
<?php include '../classes/NCC.php' ?>
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
         <form action="productadd.php" method="post" enctype="multipart/form-data"><!--Thêm ảnh -->
            <table class="form">
                <tr>
                    <td>
                        <label>Tên sách</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Nhập tên sản phẩm..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Loại Sách</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>------Chọn loại sách------</option>
                            <?php
                                $cat=new category();
                                $catlist= $cat->show_category();
                                if ($catlist) {
                                    while ($result=$catlist->fetch_assoc()) {
                                        # code...                                    
                                ?>
                            <option value="<?php echo $result['catId']?>"><?php echo $result['catName']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Ngôn ngữ</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>------Chọn ngôn ngữ------</option>
                            <?php
                                $brand=new brand();
                                $brandlist= $brand->show_brand();
                                if ($brandlist) {
                                    while ($result=$brandlist->fetch_assoc()) {
                                        # code...
                                ?>
                            <option value="<?php echo $result['brandId']?>"><?php echo $result['brandName']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Thêm mô tả sách</label>
                    </td>
                    <td>
                        <textarea name="product_desc" class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá sách</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." class="medium" />
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
                        <label>Nhà cung cấp</label>
                    </td>
                    <td>
                        <select id="select" name="ncc">
                            <option>------Chọn NCC------</option>
                            <?php
                                $ncc=new NCC();
                                $ncclist= $ncc->show_NCC();
                                if ($ncclist) {
                                    while ($result=$ncclist->fetch_assoc()) {
                                        # code...
                                ?>
                            <option value="<?php echo $result['NCCId']?>"><?php echo $result['NCCName']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="1">Featured</option>
                            <option value="0">Non-Featured</option>
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


