<?php
require "class/dbconnect.php";
$eid = $_GET['eid'];
$q = mysqli_query($conn, "Select * from tbl_category where cat_id='{$eid}'");
$data = mysqli_fetch_array($q);
if(isset($_POST['sub']))
{
    $catname = $_POST['catname'];
    
    $sql = mysqli_query($conn, "update tbl_category set cat_name='{$catname}' where cat_id='{$_GET['eid']}'");
    if($sql)
    {
        echo "<script>alert('Record updated');  window.location='category-table.php';</script>";
    }
}
?>
<html>
    <body>
        <form method="post">
        Product Name:<input type="text" name="catname" value="<?php echo $data['cat_name'];?>"><br>
        <input type="submit" name="sub">


        </form>
    </body>
</html>