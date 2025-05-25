<?php
require "class/dbconnect.php";

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
    <title>Order Details Table</title>
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
    ?<?php
    include "themepart/header.php"
    ?>
    
    <!-- Sidebar menu-->
    ?<?php
    include "themepart/sidebar.php"
    ?>
    <main class="app-content">
      
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Order Details Table</h3>
            <table class="table">
                
              <thead>
                <tr align="center">
                  <th>Sr.</th>
                  <th>Order ID</th>
                  <th>User ID</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Product ID</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                 if(isset($_GET['did']))
                 {
                     $did = $_GET['did'];
                     $dq = mysqli_query($conn, "delete from tbl_orderdetails where orderdetails_id = '{$did}'");
                     echo "<script>alert('Record Deleted')window.location='orderdetails-display.php';;</script>";
                 }
                $q = mysqli_query($conn, "SELECT * from tbl_orderdetails");
                while ($row = mysqli_fetch_assoc($q)) { ?>
                <tr align="center" class="table-success">
                    <td><?php echo $row["orderdetails_id"]; ?></td>
                    <td><?php echo $row["order_id"]; ?></td>
                    <td><?php echo $row["user_id"]; ?></td>
                    <td><?php echo $row["price"]; ?></td>
                    <td><?php echo $row["qty"]; ?></td>
                    <td><?php echo $row["pro_id"]; ?></td>
                    <td><a href="?did=<?php echo $row['orderdetails_id']; ?>">Delete</a></td>
                </tr>
                <?php }?>
                
              </tbody>
            </table>
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


