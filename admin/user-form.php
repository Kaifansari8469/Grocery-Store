<?php
require "class/dbconnect.php";
if($_POST)
{
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $uemail= mysqli_real_escape_string($conn, $_POST['uemail']);
    $gender= mysqli_real_escape_string($conn, $_POST['gender']);
    $add= mysqli_real_escape_string($conn, $_POST['add']);
    $pwd= mysqli_real_escape_string($conn, $_POST['pwd']);

    $query = mysqli_query($conn, "INSERT into tbl_user(firstname,lastname,user_email,user_gender,user_pwd,user_address) values('{$fname}','{$lname}','{$uemail}','{$gender}','{$pwd}','{$add}')") or die(mysqli_error($conn));
    if($query)
    {
        echo " <script> alert('record inserted');window.location='user-form.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Form Samples - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    
    <!-- Navbar-->
    <!-- header-->
    <?php
    include "themepart/header.php";
    ?>
    <!-- header end-->

    <!-- Sidebar menu-->
    <?php
    include "themepart/sidebar.php";
    ?>
     <!-- Sidebar menu end-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Form Samples</h1>
          <p>Sample forms</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">User Forms</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">User details </h3>
            <div class="tile-body">
              <form method="post">
                <div class="form-group">
                  <label class="control-label">FirstName</label>
                  <input class="form-control" type="text"  name="fname" placeholder="Enter firstname" required>
                </div>
                <div class="form-group">
                  <label class="control-label">LastName</label>
                  <input class="form-control" type="text"  name="lname" placeholder="Enter lastrname" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <input class="form-control" type="email" name="uemail" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Password</label>
                  <input class="form-control" type="text"  name="pwd" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Gender</label>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="gender" value="male"  >Male
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="gender" value="female">Female
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Address</label>
                  <textarea class="form-control" type="text" name="add" placeholder="Enter address"  required></textarea>
                </div>
                <div class="form-group">
                  <input class="btn btn-primary" type="submit" value="Submit">
                  <input class="btn btn-danger" type="reset" value="Clear">
                </div>
              </form>
            </div>
          </div>
        </div>
        
        
        
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
    
  </body>
</html>