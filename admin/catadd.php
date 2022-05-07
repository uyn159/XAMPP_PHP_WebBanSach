<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php' ?>
<?php
    $class =new category();//goi class trong file adminlogin
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {//form gui du lieu bang post
        # code...
        $catName = $_POST['catName'];//tao 2 cai bien lay du lieu tu post       
        $InsertCate=$class->insert_category($catName);//goi ham login_admin
    }
?>
        <div class="grid_10" >
            <div class="box round first grid">
                <h2>Thêm loại sách</h2>
                <div class="block copyblock">
                <?php  
                    if (isset($InsertCate)) {
                        echo $InsertCate;
                    }
                ?>
                 <form action="catadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Thêm loại sách ..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>