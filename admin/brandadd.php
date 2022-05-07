<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php' ?>
<?php
    $brand =new brand();//goi class trong file adminlogin
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {//form gui du lieu bang post
        # code...
        $brandName = $_POST['brandName'];    
        $Insertbrand=$brand->insert_brand($brandName);//goi ham login_admin
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm </h2>
                <div class="block copyblock">
                <?php  
                    if (isset($Insertbrand)) {
                        echo $Insertbrand;
                    }
                ?>
                 <form action="brandadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Thiêm loại ngôn ngữ..." class="medium" />
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