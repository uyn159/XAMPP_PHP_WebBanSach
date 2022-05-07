<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php' ?>

<?php
    $brand =new brand();//goi class trong file adminlogin
    if (!isset($_GET['brandid']) || $_GET['brandid']==NULL ) {//lay id
        echo "<script>window.lobrandion='brandlist.php'</script>";//xét điều kiện trên thỏa thì sẽ trả về trang brandlist không thì sẽ lấy được ìd
        }
        else{
            $id=$_GET['brandid'];
        }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {//form gui du lieu bang post
        # code...
        $brandName = $_POST['brandName'];//tao bien lay du lieu tu post       
        $updatebrand=$brand->update_brand($brandName,$id);//goi ham update_admin
    }
?>
        <div class="grid_10" >
            <div class="box round first grid">
                <h2>Sửa loại ngôn ngữ</h2>
                <div class="block copyblock">
                <?php  
                    if (isset($updatebrand)) {
                        echo $updatebrand;
                    }
                ?>
                <?php  
                    $get_name=$brand->getbrandbyid($id);//select id
                    if ($get_name) {
                        # code...
                        while ($result=$get_name->fetch_assoc()) {
                            # code....
                ?>
                 <form method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['brandName'] ?>" name="brandName" placeholder="Sửa danh mục sản phẩm" class="medium" />
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