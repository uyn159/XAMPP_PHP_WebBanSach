<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/nhanvien.php' ?>
<?php
    $pd=new nhanvien();
        if (!isset($_GET['nhanvienid']) || $_GET['nhanvienid']==NULL ) {//lay id
        echo "<script>window.location='nhanvienlist.php'</script>";//xét điều kiện trên thỏa thì sẽ trả về trang nhanvienlist NVông thì sẽ lấy được id
        }
        else{
            $id=$_GET['nhanvienid'];
        }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {//bao mat       
        $updatenhanvien=$pd->update_nhanvien($_POST,$_FILES,$id);//$files tai vi co hinh anh
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa thông tin nhân viên</h2>
        <div class="block">
        <?php  
            if (isset($updatenhanvien)) {
                echo $updatenhanvien;
            }
        ?>                  
        <?php
            $getid=$pd->getnhanvienbyid($id);
                if ($getid) {
                    # code...
                    while ($result_nhanvien=$getid->fetch_assoc()) {
                        # code...

        ?>
         <form action="" method="post" enctype="multipart/form-data"><!--Thêm ảnh -->
            <table class="form">
                <tr>
                    <td>
                        <label>Họ</label>
                    </td>
                    <td>
                        <input type="text" name="HNV" value="<?php echo $result_nhanvien['HNV'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="TNV" value="<?php echo $result_nhanvien['TNV'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ảnh</label>
                    </td>
                    <td>
                        <img src="uploadnv/<?php echo $result_nhanvien['image'];  ?>" width="110"></br>
                        <input type="file" name="image" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Chức vụ</label>
                    </td>
                    <td>
                        <select id="select" name="type1">
                            <option>Chọn</option>
                            <?php
                            if ($result_nhanvien['type1']==1) {
                                # code..
                            ?>
                            <option selected value="1">Nhân viên</option>
                            <option value="2">Khác</option>
                            <option value="0">Quản lý</option>
                            <?php
                            }elseif ($result_nhanvien['type1']==2) {
                                # code...
                            ?>
                            <option value="1">Nhân viên</option>
                            <option selected value="2">Khác</option>
                            <option value="0">Quản lý</option>
                            <?php
                            }else{
                            ?>
                            <option value="1">Nhân viên</option>
                            <option value="2">Khác</option>
                            <option selected value="0">Quản lý</option>
                            <?php
                            }
                              ?>
                        </select>
                        <!-- <select id="select" name="type1">
                            <option>Chọn chức vụ</option>
                            <option value="3">Khác</option>
                            <option value="2">Bảo vệ</option>
                            <option value="1">Nhân viên</option>
                            <option value="0">Quản lý</option>
                        </select> -->
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
                            if ($result_nhanvien['type']==1) {
                                # code..
                            ?>
                            <option selected value="0">Nam</option>
                            <option value="1">Nữ</option>
                            <option value="2">Khác</option>
                            <?php
                            }elseif ($result_nhanvien['type']==2) {
                                # code...
                            ?>
                            <option value="0">Nam</option>
                            <option selected value="1">Nữ</option>
                            <option value="2">Khác</option>
                            <?php
                            }else{
                            ?>
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                            <option selected value="2">Khác</option>
                            <?php
                            }
                              ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày sinh</label>
                    </td>
                    <td>
                        <input type="text" name="NSNV" value="<?php echo $result_nhanvien['NSNV'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Số điện thoại</label>
                    </td>
                    <td>
                        <input type="text" name="SDTNV" value="<?php echo $result_nhanvien['SDTNV'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Chứng minh nhân dân</label>
                    </td>
                    <td>
                        <input type="text" name="CMNDNV" value="<?php echo $result_nhanvien['CMNDNV'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Lương</label>
                    </td>
                    <td>
                        <input type="text" name="LNV" value="<?php echo $result_nhanvien['LNV'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày bắt đầu</label>
                    </td>
                    <td>
                        <input type="text" name="NBD" value="<?php echo $result_nhanvien['NBD'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tài khoản ngân hàng</label>
                    </td>
                    <td>
                        <input type="text" name="TKNHNV" value="<?php echo $result_nhanvien['TKNHNV'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Địa chỉ</label>
                    </td>
                    <td>
                        <input type="text" name="DCNV" value="<?php echo $result_nhanvien['DCNV'] ?>" class="medium" />
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


