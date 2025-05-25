
<?php 
session_start(); 
include "class/dbconnect.php";

if(isset($_POST['submit'])){
    
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $gender= mysqli_real_escape_string($conn, $_POST['gender']);
    $address= mysqli_real_escape_string($conn, $_POST['address']);
    $cpass= mysqli_real_escape_string($conn, $_POST['cpass']);
    $pass= mysqli_real_escape_string($conn, $_POST['pass']);

    
    
    if($pass!=$cpass)
    {
        echo " <script> alert('Please enter same password')</script>";
        

    }
    else{

		$query = mysqli_query($conn, "INSERT into tbl_user(firstname,lastname,user_email,user_gender,user_pwd,user_address) values('{$fname}','{$lname}','{$email}','{$gender}','{$pass}','{$address}')") or die(mysqli_error($conn));
        
        header("location:index.php");
    }
        
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Sign-Up</title>
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
					<li><a href="contact-us.php">contact Us</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Sign Up
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- signup -->
			<div class="contact agileits">
				<div class="contact-agileinfo">
					<div class="contact-form wthree">
						<form action="#"  id="myform" method="post">
							<div class="">
								<input type="text" name="fname" placeholder="FirstName" class="required" required="">
							</div>
							<div class="">
								<input type="text" name="lname" placeholder="LastName" class="required" required="">
							</div>
							<div class="">
								<input type="email" name="email" placeholder="Email" class="email" required="">
							</div>
							<div class="">
								<input class="form-control" type="password" name="pass" placeholder="Password" class="required" required="" >
							</div><br>
							<div class="">
								<input class="" type="text" name="cpass" placeholder="Confirm Password" class="confirmpassword" required="">
							</div>
							<div class="form-group">
								
									<label class=radio-inline>Gender:</label>
								<input type="radio" name="gender" value="Male" class="remote" required="">Male
								<input type="radio" name="gender" value="Female"  class="remote" required="">Female
								
							</div>
							<div class="">
								<textarea placeholder="Address" name="address" class="required" required=""></textarea>
							</div>
							<input type="submit" name="submit" value="Submit">
						</form>
					</div>
					
				</div>
			</div>
			
		</div>
	</div>
	
	
</body>

</html>