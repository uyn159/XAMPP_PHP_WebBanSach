<?php include 'inc/header2.php';?>
<?php include 'inc/slidebar2.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/hoadon.php'?>
<?php
    $pd =new hoadon();//goi class trong file adminlogin
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {//bao mat       
        $inserthoadon=$pd->insert_hoadon($_POST,$_FILES);//$files tai vi co hinh anh
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm nhân viên</h2>
        <div class="block">
        <?php  
            if (isset($inserthoadon)) {
                echo $inserthoadon;
            }
        ?>                  
         <form action="hoadonadd.php" method="post" enctype="multipart/form-data"><!--Thêm ảnh -->
            <table class="form">
                <tr>
                    <td>
                        <label>Ngày in hóa đơn</label>
                    </td>
                    <td>
                        <input type="DATE" name="DATEHD" placeholder="Nhập ngày ...." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Loại Sách</label>
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
                            <option value="<?php echo $result['catId']?>"><?php echo $result['productName']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Số lượng</label>
                    </td>
                    <td>
                        <input type="text" name="TNV" placeholder="Nhập số lượng sách mua..." class="medium" />
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
<?php include 'inc/footer2.php';?>


