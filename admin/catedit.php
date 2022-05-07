<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php' ?>

<?php
    $cat =new category();//goi class trong file adminlogin
    if (!isset($_GET['catid']) || $_GET['catid']==NULL ) {//lay id
        echo "<script>window.location='catlist.php'</script>";//xét điều kiện trên thỏa thì sẽ trả về trang catlist không thì sẽ lấy được ìd
        }
        else{
            $id=$_GET['catid'];
        }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {//form gui du lieu bang post
        # code...
        $catName = $_POST['catName'];//tao bien lay du lieu tu post       
        $updateCat=$cat->update_category($catName,$id);//goi ham update_admin
    }
?>
        <div class="grid_10" >
            <div class="box round first grid">
                <h2>Sửa thể loại</h2>
                <div class="block copyblock">
                <?php  
                    if (isset($updateCat)) {
                        echo $updateCat;
                    }
                ?>
                <?php  
                    $get_name=$cat->getcatbyid($id);//select id
                    if ($get_name) {
                        # code...
                        while ($result=$get_name->fetch_assoc()) {
                            # code....
                ?>
                 <form method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['catName'] ?>" name="catName"class="medium" />
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