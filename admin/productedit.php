<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php' ?>
<?php include '../classes/NCC.php' ?>
<?php
    $pd=new product();
        if (!isset($_GET['productid']) || $_GET['productid']==NULL ) {//lay id
        echo "<script>window.location='productlist.php'</script>";//xét điều kiện trên thỏa thì sẽ trả về trang productlist không thì sẽ lấy được id
        }
        else{
            $id=$_GET['productid'];
        }
    $pd =new product();//goi class trong file adminlogin
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {//bao mat       
        $updateProduct=$pd->update_product($_POST,$_FILES,$id);//$files tai vi co hinh anh
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
        <div class="block">
        <?php  
            if (isset($updateProduct)) {
                echo $updateProduct;
            }
        ?>                  
        <?php
            $getid=$pd->getproductbyid($id);
                if ($getid) {
                    # code...
                    while ($result_product=$getid->fetch_assoc()) {
                        # code...

        ?>
         <form action="productlist.php" method="post" enctype="multipart/form-data"><!--Thêm ảnh -->
            <table class="form">
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $result_product['productName'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>------Select Category------</option>
                            <?php
                                $cat=new category();
                                $catlist= $cat->show_category();//co id nen minh sẽ sử dụng id đấy
                                if ($catlist) {
                                    while ($result=$catlist->fetch_assoc()) {
                                        # code...    



                                ?>
                            <option


                            <?php 
                            if ($result['catId']==$result_product['catId']) {echo 'selected';}
                             ?>
                             value="<?php echo $result['catId']?>"><?php echo $result['catName']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>------Select Brand------</option>
                            <?php
                                $brand=new brand();
                                $brandlist= $brand->show_brand();
                                if ($catlist) {
                                    while ($result=$brandlist->fetch_assoc()) {
                                        # code...
                                ?>
                            <option
                            <?php
                            if ($result['brandId']==$result_product['brandId']) {echo 'selected';}
                            ?>
                             value="<?php echo $result['brandId']?>"><?php echo $result['brandName']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="product_desc" class="tinymce"><?php echo $result_product['product_desc'] ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $result_product['price'] ?>"  class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result_product['image'];  ?>" width="110"></br>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php
                            if ($result_product['type']==1) {
                                # code..

                              ?>
                            <option selected value="1">Featured</option>
                            <option value="0">Non-Featured</option>
                            <?php
                            }else{
                            ?>
                            <option value="1">Featured</option>
                            <option selected value="0">Non-Featured</option>
                            <?php
                            }
                              ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>NCC</label>
                    </td>
                    <td>
                        <select id="select" name="ncc">
                            <option>------Select NCC------</option>
                            <?php
                                $ncc=new NCC();
                                $ncclist= $ncc->show_NCC();
                                if ($ncclist) {
                                    while ($result=$ncclist->fetch_assoc()) {
                                        # code...
                                ?>
                            <option
                            <?php
                            if ($result['NCCId']==$result_product['NCCId']) {echo 'selected';}
                            ?>
                             value="<?php echo $result['NCCId']?>"><?php echo $result['NCCName']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
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


