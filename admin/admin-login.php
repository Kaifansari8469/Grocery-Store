<?php 
session_start(); 
include "class/dbconnect.php";

if(isset($_POST['submit'])){
    
    $aemail=$_POST['aemail'];
    $password=$_POST['pwd'];

    $sql = mysqli_query($conn,"SELECT * FROM tbl_admin WHERE adm_email='{$aemail}'AND adm_pwd='{$password}'") or die(mysqli_error($conn));
    
    $count=mysqli_num_rows($sql);
    
    $row = mysqli_fetch_array($sql);
    
    if($count>0)
    {
    
        $_SESSION['adminid']=$row['adm_id'];
        $_SESSION['adminname']=$row['adm_name'];
        header("location:dashboard.php");
    }
    else{
        echo " <script> alert('Email and password not Correct.') </script>";
        
    }
        
}

?>

<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
$connection = new mysqli("localhost", "root", "", "grocerydb");

if (isset($_POST['reset'])) {
    $email = $_POST['email'];
    $sqll = mysqli_query($connection, "select * from tbl_admin where adm_email='{$email}'") or die(mysqli_error($connection));
    $count = mysqli_num_rows($sqll);
    $roww = mysqli_fetch_array($sqll);
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
                    $mail->Body = "Hi $email your password is {$roww['adm_pwd']}";
            $mail->AltBody = "Hi $email your password is {$roww['adm_pwd']}";

            $mail->send();
            echo "<script>alert('Your password was sent in your email ID.');window.location='admin-login.php';</script>";
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
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1></h1>
      </div>
      <div class="login-box">
        <form class="login-form"  method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text"  name="aemail" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password"  name="pwd" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="utility">
            
              <p class="semibold-text mb-2"><a href="forget-pass.php" data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>
          
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
        <form class="forget-form" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text"  name="email" placeholder="Email" required>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name="reset"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>      
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
  
</html>