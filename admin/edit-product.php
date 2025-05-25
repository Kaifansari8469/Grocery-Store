<?php
require "class/dbconnect.php";
$eid = $_GET['eid'];
$q = mysqli_query($conn, "Select * from tbl_product where pro_id='{$eid}'");
$data = mysqli_fetch_array($q);
if(isset($_POST['sub']))
{
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $details = $_POST['details'];
    $img = $_POST['image'];
    $subcat = $_POST['subcat_id'];
    $sql = mysqli_query($conn, "update tbl_product set pro_name='{$pname}',pro_price='{$price}',pro_details='{$details}',pro_image='{$img}',subcat_id='{$subcat}' where pro_id='{$_GET['eid']}'");
    if($sql)
    {
        echo "<script>alert('Record updated');  window.location='product-table.php';</script>";
    }
}
?>
<html>
    <body>
        <form method="post">
        Product Name:<input type="text" name="pname" value="<?php echo $data['pro_name'];?>"><br>
        Product Price:<input type="text" name="price" value="<?php echo $data['pro_price'];?>"><br>
        Product Details:<input type="text" name="details" value="<?php echo $data['pro_details'];?>"><br>
        Product Image:<input type="text" name="image" value="<?php echo $data['pro_image'];?>"><br>
        Product Sub-category:</Sub-category>:<input type="text" name="subcat_id" value="<?php echo $data['subcat_id'];?>"><br>
        <input type="submit" name="sub">


        </form>
    </body>
</html>