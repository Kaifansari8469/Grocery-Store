<?php 
session_start(); 
include "class/dbconnect.php";
include 'class/session-check.php';
if(isset($_POST["submit"]))
{
    
    $pro_id=mysqli_real_escape_string($conn,$_POST["pro_id"]);
    $query = mysqli_query($conn, "select *from tbl_cart where user_id='{$user_id}' and pro_id='{$pro_id}'") or die(mysqli_error($conn));

    $count = mysqli_num_rows($query);
    
    if ($count > 0) {
        
        echo "<script>alert('Your product already exist in cart');window.location='cart-list.php';</script>";
        exit();
    }
    else{
        
    $query_ins_cart = mysqli_query($conn,"INSERT INTO `tbl_cart`(`user_id`, `pro_id`, `total_qty`) VALUES ('{$user_id}','{$pro_id}','1')");
    if($query_ins_cart)
    {
        
        echo "<script>alert('Your product add to cart successfully');window.location='cart-list.php';</script>";
        
        exit();
    }
    }
    
exit();
}
