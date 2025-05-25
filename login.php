<?php 
session_start(); 
include "class/dbconnect.php";

if(isset($_POST['submit'])){
    
    $uemail=$_POST['uemail'];
    $password=$_POST['pwd'];

    $sql = mysqli_query($conn,"SELECT * FROM tbl_user WHERE user_email='{$uemail}'AND user_pwd='{$password}'") or die(mysqli_error($conn));
    
    $count=mysqli_num_rows($sql);
    $row = mysqli_fetch_array($sql);
    
    if($count>0)
    {
    
        $_SESSION['userid']=$row['user_id'];
        $_SESSION['firstname']=$row['firstname'].['lastname'];
        header("location:home.php");
    }
    else{
        echo " <script> alert('Email and password not match.') </script>";
        
    }
        
}

?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Page</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <!-- //Meta tag Keywords -->
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">

</head>

<body >
    <div class="background-image">
        <!-- container -->
        <div class="wrapper">
            <!-- main content -->
            <div class="w3l-form-info">
                <div class="w3_info">
                    <h1>Welcome Grocery Store</h1>
                   
                    <h2>Log In</h2>
                    <form  method="post">
                        <div class="input-group">
                            <span><i class="fa fa-user" aria-hidden="true"></i></span>
                            <input type="email" name="uemail" placeholder="Email" required="">
                        </div>
                        <div class="input-group two-groop">
                            <span><i class="fa fa-key" aria-hidden="true"></i></span>
                            <input type="Password"  name="pwd" placeholder="Password" required="">
                        </div>
                        <div class="form-row bottom">
                            <div class="form-check">
                                <input type="checkbox" id="remenber" name="remenber" value="remenber">
                                <label for="remenber"> Remember me?</label>
                            </div>
                            <a href="C:\xampp\htdocs\maildemo\forget-pass.php" class="forgot">Forgot password?</a>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit" name="submit">Log In</button>
                    </form>
                    
                
                    <p class="account">Don't have an account? <a href="registration.php">Register</a></p>
                </div>
            </div>
            <!-- //main content -->
        </div>
        <!-- //container -->
        <!-- footer -->
        <div class="footer">
            
        </div>
        <!-- footer -->
    </div>

    

</body>
<style>
    * {
        margin: 0;
        padding: 0;
    }
    .background-image{
        background-image: url('./images/3.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        opacity: 100;
       
        
        height: 100vh;
    }
</style>

</html>