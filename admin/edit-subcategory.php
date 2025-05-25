<?php
require "class/dbconnect.php";
$eid = $_GET['eid'];
$q = mysqli_query($conn, "Select * from tbl_subcat where subcat_id='{$eid}'");
$data = mysqli_fetch_array($q);
if(isset($_POST['sub']))
{
    $subcatname = $_POST['subcatname'];
    $catid = $_POST['catid'];
    
    $sql = mysqli_query($conn, "update tbl_subcat set subcat_name='{$subcatname}',cat_id='{$catid}' where subcat_id='{$_GET['eid']}'");
    if($sql)
    {
        echo "<script>alert('Record updated');  window.location='subcategory-table.php';</script>";
    }
}
?>
<html>
    <body>
        <form method="post">
        Sub-Category Name:<input type="text" name="subcatname" value="<?php echo $data['subcat_name'];?>"><br>
        Category ID:<input type="text" name="catid" value="<?php echo $data['cat_id'];?>"><br>
        <input type="submit" name="sub">


        </form>
    </body>
</html>