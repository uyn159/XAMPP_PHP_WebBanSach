<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath=realpath(dirname(__FILE__)); 
    include_once ($filepath.'/../classes/customer.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
    $cus =new customer();//goi class trong file adminlogin
    if (!isset($_GET['customerid']) || $_GET['customerid']==NULL ) {//lay id
        echo "<script>window.location='index.php'</script>";//xét điều kiện trên thỏa thì sẽ trả về trang catlist không thì sẽ lấy được ìd
        }
        else{
            $id=$_GET['customerid'];
        }
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {//form gui du lieu bang post
    //     # code...
    //     $catName = $_POST['catName'];//tao bien lay du lieu tu post       
    //     $updateCat=$cus->update_category($catName,$id);//goi ham update_admin
    // }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
                <div class="block copyblock">
                <?php  
                    $get_customer=$cus->show_customers($id);//select id
                    if ($get_customer) {
                        # code...
                        while ($result=$get_customer->fetch_assoc()) {
                            # code....
                ?>
                 <form method="post">
                    <table class="form">					
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['name'] ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['phone'] ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['city'] ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['address'] ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['country'] ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['zipcode'] ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['email'] ?>" name="catName" class="medium" />
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
<?php include 'inc/bcompiler_write_footer(  ).php';?>