<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/khuyenmai.php';?>
<?php include '../classes/ctkhuyenmai.php' ?>
<?php
    $pd=new ctkhuyenmai();
        if (!isset($_GET['ctkhuyenmaiid']) || $_GET['ctkhuyenmaiid']==NULL ) {//lay id
        echo "<script>window.location='ctkhuyenmailist.php'</script>";//xét điều kiện trên thỏa thì sẽ trả về trang ctkhuyenmailist không thì sẽ lấy được id
        }
        else{
            $id=$_GET['ctkhuyenmaiid'];
        }
    $pd =new ctkhuyenmai();//goi class trong file adminlogin
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {//bao mat       
        $updatectkhuyenmai=$pd->update_ctkhuyenmai($_POST,$id);//$files tai vi co hinh anh
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
        <div class="block">
        <?php  
            if (isset($updatectkhuyenmai)) {
                echo $updatectkhuyenmai;
            }
        ?>                  
        <?php
            $getid=$pd->getctkhuyenmaibyid($id);
                if ($getid) {
                    # code...
                    while ($result_ctkhuyenmai=$getid->fetch_assoc()) {
                        # code...

        ?>
         <form action="" method="post" enctype="multipart/form-data"><!--Thêm ảnh -->
            <table class="form">
                <tr>
                    <td>
                        <label>Khuyến mãi</label>
                    </td>
                    <td>
                        <select id="select" name="khuyenmai">
                            <option>------Select Category------</option>
                            <?php
                                $cat=new khuyenmai();
                                $catlist= $cat->show_khuyenmai();//co id nen minh sẽ sử dụng id đấy
                                if ($catlist) {
                                    while ($result=$catlist->fetch_assoc()) {
                                        # code...    
                                ?>
                            <option


                            <?php 
                            if ($result['KMId']==$result_ctkhuyenmai['KMId']) {echo 'selected';}
                             ?>
                             value="<?php echo $result['KMId']?>"><?php echo $result['TKM']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="percent" value="<?php echo $result_ctkhuyenmai['percent'] ?>"  class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Sách</label>
                    </td>
                    <td>
                        <select id="select" name="product">
                            <option>------Chọn Sách------</option>
                            <?php
                                $product=new product();
                                $productlist= $product->show_product();
                                if ($productlist) {
                                    while ($result=$productlist->fetch_assoc()) {
                                        # code...
                                ?>
                            <option
                            <?php
                            if ($result['productId']==$result_ctkhuyenmai['productId']) {echo 'selected';}
                            ?>
                             value="<?php echo $result['productId']?>"><?php echo $result['productName']?></option>
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


