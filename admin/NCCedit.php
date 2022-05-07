<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/NCC.php' ?>

<?php
    $NCC =new NCC();//goi class trong file adminlogin
    if (!isset($_GET['NCCid']) || $_GET['NCCid']==NULL ) {//lay id
        echo "<script>window.loNCCion='NCClist.php'</script>";//xét điều kiện trên thỏa thì sẽ trả về trang NCClist không thì sẽ lấy được ìd
        }
        else{
            $id=$_GET['NCCid'];
        }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {//form gui du lieu bang post
        # code...
        $NCCName = $_POST['NCCName'];//tao bien lay du lieu tu post       
        $updateNCC=$NCC->update_NCC($_POST,$id);//goi ham update_admin
    }
?>
        <div class="grid_10" >
            <div class="box round first grid">
                <h2>Sửa thông tin nhà cung cấp</h2>
                <div class="block copyblock">
                <?php  
                    if (isset($updateNCC)) {
                        echo $updateNCC;
                    }
                ?>
                <?php  
                    $get_name=$NCC->getNCCbyid($id);//select id
                    if ($get_name) {
                        # code...
                        while ($result=$get_name->fetch_assoc()) {
                            # code....
                ?>
                 <form method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['NCCName'] ?>" name="NCCName" placeholder="Sửa danh mục sản phẩm" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['DCNCC'] ?>" name="DCNCC" placeholder="Sửa danh mục sản phẩm" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['SDTNCC'] ?>" name="SDTNCC" placeholder="Sửa danh mục sản phẩm" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update"/>
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
<?php include 'inc/footer.php';?>