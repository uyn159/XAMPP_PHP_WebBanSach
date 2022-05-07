<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/khachhang.php' ?>
<?php
    $pd=new khachhang();
        if (!isset($_GET['khachhangid']) || $_GET['khachhangid']==NULL ) {//lay id
        echo "<script>window.location='khachhanglist.php'</script>";//xét điều kiện trên thỏa thì sẽ trả về trang khachhanglist không thì sẽ lấy được id
        }
        else{
            $id=$_GET['khachhangid'];
        }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {//bao mat       
        $updatekhachhang=$pd->update_khachhang($_POST,$id);//$files tai vi co hinh anh
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
        <div class="block">
        <?php  
            if (isset($updatekhachhang)) {
                echo $updatekhachhang;
            }
        ?>                  
        <?php
            $getid=$pd->getkhachhangbyid($id);
                if ($getid) {
                    # code...
                    while ($result_khachhang=$getid->fetch_assoc()) {
                        # code...

        ?>
         <form action="" method="post" enctype="multipart/form-data"><!--Thêm ảnh -->
            <table class="form">
                <tr>
                    <td>
                        <label>Tên khách hàng</label>
                    </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $result_khachhang['name'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Giới tính</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Chọn</option>
                            <?php
                            if ($result_khachhang['type']==0) {
                                # code..
                            ?>
                            <option selected value="0">Nam</option>
                            <option value="1">Nữ</option>
                            <option value="2">khác</option>
                            <?php
                            }elseif ($result_khachhang['type']==1) {
                                # code...
                            ?>
                            <option value="0">Nam</option>
                            <option selected value="1">Nữ</option>
                            <option value="2">khác</option>
                            <?php
                            }else{
                            ?>
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                            <option selected value="2">khác</option>
                            <?php
                            }
                              ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Địa chỉ</label>
                    </td>
                    <td>
                        <input type="text" name="address" value="<?php echo $result_khachhang['address'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Thành phố</label>
                    </td>
                    <td>
                        <input type="text" name="city" value="<?php echo $result_khachhang['city'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Quốc gia</label>
                    </td>
                    <td>
                        <input type="text" name="country" value="<?php echo $result_khachhang['country'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Mã ngân hàng</label>
                    </td>
                    <td>
                        <input type="text" name="zipcode" value="<?php echo $result_khachhang['zipcode'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Số điện thoại</label>
                    </td>
                    <td>
                        <input type="text" name="phone" value="<?php echo $result_khachhang['phone'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" name="email" value="<?php echo $result_khachhang['email'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Mật khẩu</label>
                    </td>
                    <td>
                        <input type="text" name="password" value="<?php echo md5($result_khachhang['password']) ?>" class="medium" />
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


