<?php
require "class/dbconnect.php";
if($_POST)
{
  
    $subcatname = mysqli_real_escape_string($conn, $_POST['sname']);
    $catid= mysqli_real_escape_string($conn, $_POST['catid']);
    

    $query = mysqli_query($conn, "INSERT into tbl_subcat(subcat_name,cat_id) values('{$subcatname}','{$catid}')") or die(mysqli_error($conn));
    if($query)
    {
        echo " <script> alert('record inserted');window.location='subcategory-form.php';</script>";
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
    <title>Sub-Category Form</title>
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
          <h1><i class="fa fa-edit"></i> Sub-Category</h1>
          <p>Sub-Category forms</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Sub-Category Forms</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="tile">
            <h3 class="tile-title">Sub-Category details </h3>
            <div class="tile-body">
              <form method="post">
              
                <div class="form-group">
                  <label class="control-label">Category ID</label>
                  <select name="catid">
                    <?php
                    $sq = mysqli_query($conn, "select * from tbl_category");
                    while($row=mysqli_fetch_array($sq))
                    {
                      echo "<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Sub-Category Name</label>
                  <input class="form-control" type="text" name="sname" placeholder="Enter sub-category name"  required>
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