<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/khuyenmai.php' ?>
<?php
    $pd=new khuyenmai();
        if (!isset($_GET['khuyenmaiid']) || $_GET['khuyenmaiid']==NULL ) {//lay id
        echo "<script>window.location='khuyenmailist.php'</script>";//xét điều kiện trên thỏa thì sẽ trả về trang khuyenmailist không thì sẽ lấy được id
        }
        else{
            $id=$_GET['khuyenmaiid'];
        }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {//bao mat       
        $updatekhuyenmai=$pd->update_khuyenmai($_POST,$id);//$files tai vi co hinh anh
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
        <div class="block">
        <?php  
            if (isset($updatekhuyenmai)) {
                echo $updatekhuyenmai;
            }
        ?>                  
        <?php
            $getid=$pd->getkhuyenmaibyid($id);
                if ($getid) {
                    # code...
                    while ($result_khuyenmai=$getid->fetch_assoc()) {
                        # code...

        ?>
         <form action="" method="post" enctype="multipart/form-data"><!--Thêm ảnh -->
            <table class="form">
                <tr>
                    <td>
                        <label>Tên  sự kiện</label>
                    </td>
                    <td>
                        <input type="text" name="TKM" value="<?php echo $result_khuyenmai['TKM'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày bắt đầu</label>
                    </td>
                    <td>
                        <input type="text" name="NBD" value="<?php echo $result_khuyenmai['NBD'] ?>" class="medium" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Ngày kết thúc</label>
                    </td>
                    <td>
                        <input type="text" name="NKT" value="<?php echo $result_khuyenmai['NKT'] ?>" class="medium" />
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


