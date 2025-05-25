<?php
session_start();
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
$connection = new mysqli("localhost", "root", "", "grocerydb");

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $sql = mysqli_query($connection, "select * from tbl_user where user_email='{$email}'") or die(mysqli_error($connection));
    $count = mysqli_num_rows($sql);
    $row = mysqli_fetch_array($sql);
    if ($count > 0) 
    {
       // echo $row['adm_pwd'];
    

       

        //Load Composer's autoloader
        require 'vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'mygrocery8469@gmail.com';                     //SMTP username
            $mail->Password   = 'cpzegheloyzfqdmx';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('mygrocery8469@gmail.com', 'Grocery Demo');
            $mail->addAddress($email, $email);     //Add a recipient
            

        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Forget Password';
                    $mail->Body = "Hi $email your password is {$row['user_pwd']}";
            $mail->AltBody = "Hi $email your password is {$row['user_pwd']}";

            $mail->send();
            echo "<script>alert('Your password was sent in your email ID.')</script>";
        
        } catch (Exception $e) {
            echo '<script>alert("Email could not be sent. Mailer Error: {$mail->ErrorInfo}")</script>';
        }
    }
    else{
        echo "<script>alert('Email not found'); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Forget Password</title>
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
						<a href="sign-in.php">Sign-In</a>
						
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
			<h3 class="tittle-w3l">Forget Password
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
						<form  id="myform" method="post">
							
							<div class="">
								<input type="email" name="email" placeholder="Email" class="email" required>
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