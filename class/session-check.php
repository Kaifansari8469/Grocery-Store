<?php 
if(isset($_SESSION["userid"]))
{
    $query_user = mysqli_query($conn, "select * from tbl_user where user_id='{$_SESSION["userid"]}'") or die(mysqli_error($conn));
$get_user = mysqli_fetch_array($query_user);
   
                    $user_id  =    $get_user["user_id"];
                    $user_name  =    $get_user["firstname"]." ".$get_user["lastname"];
                    $firstname  =    $get_user["firstname"];
                    $lastname  =    $get_user["lastname"];
                    $user_address  =    $get_user["user_address"];
                    // $user_mobile  =    $get_user["user_mobile"];
                    
}
else{
    
    echo "<script>alert('Please First Login');window.location='sign-in.php';</script>";
    exit();
}
?>