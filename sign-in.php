
<?php 
session_start(); 
include "class/dbconnect.php";

if(isset($_POST['submit'])){
    
    $uemail=$_POST['email'];
    $password=$_POST['pass'];

    $sql = mysqli_query($conn,"SELECT * FROM tbl_user WHERE user_email='{$uemail}'AND user_pwd='{$password}'") or die(mysqli_error($conn));
    
    $count=mysqli_num_rows($sql);
    $row = mysqli_fetch_array($sql);
    
    if($count>0)
    {
    
        $_SESSION['userid']=$row['user_id'];
        $_SESSION['firstname']=$row['firstname'].['lastname'];
        header("location:index.php");
    }
    else{
        echo " <script> alert('Email and password not match.') </script>";
        
    }
        
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Sign In</title>
	<script src="jquery-3.1.1.js" type="text/javascript"></script>
	<script src="jquery.validate.js" type="text/javascript"></script>
	<script>
			$(document) .ready(function(){
				$("#myform"). validate();
			});
	</script>
	<style>
		.error{
			color:red;
		}
		</style>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="usercss/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="usercss/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="usercss/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="usercss/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="usercss/jquery-ui1.css">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
		<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<li>
						<a href="contact-us.php">Contact-Us</a>
						<i>|</i>
					</li>
					<li>
						<a href="user-changepwd.php">Change Password</a>
						<i>|</i>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container" >
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Sign In
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- signup -->
			<div class="contact agileits" >
				<div class="contact-agileinfo">
					<div class="contact-form wthree">
						<form action="sign-in.php" id="myform" method="post">
							
							<div class="">
								<input type="email" name="email" placeholder="Email" class="email" required>
							</div>
							<div class="">
								<input class="form-control" type="password" name="pass" placeholder="Password" class="required" required>
							</div>
                            <p><spam><h4 align="left"><a href="sign-up.php">Don't have a account?</a></h4> <h4 align="right"><a href="forget-pass.php">Forget Password?</a></h4></spam></p>
							<input type="submit" name="submit" value="Submit">
						</form>
					</div>
					
				</div>
			</div>
			<!-- //signup -->
		</div>
	</div>
	
	
</body>

</html>