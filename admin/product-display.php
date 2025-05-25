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
    <title>Product Table</title>
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
      
        <div class="col-md-10">
          <div class="tile">
            <h3 class="tile-title">Product Table</h3>
            <table class="table">
                
              <thead>
                <tr align="center">
                  <th>Sr.</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Product Details</th>
                  <th>Product Image</th>
                  <th>Sub-Category Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(isset($_GET['did']))
                {
                    $did = $_GET['did'];
                    $dq = mysqli_query($conn, "delete from tbl_product where pro_id = '{$did}'");
                    echo "<script>alert('Record Deleted');window.location='product-display.php';</script>";
                }
                $sql="SELECT
                          `tbl_product`.`pro_id`
                          , `tbl_product`.`pro_name`
                          , `tbl_product`.`pro_price`
                          , `tbl_product`.`pro_details`
                          , `tbl_product`.`pro_image`
                          , `tbl_subcat`.`subcat_name`
                      FROM
                          `tbl_product`
                          INNER JOIN `tbl_subcat` 
                              ON (`tbl_product`.`subcat_id` = `tbl_subcat`.`subcat_id`)
                      ORDER BY `tbl_product`.`pro_id` ASC;";
                $q = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($q)) { ?>
                <tr align="center" class="table-success">
                    <td><?php echo $row["pro_id"]; ?></td>
                    <td><?php echo $row["pro_name"]; ?></td>
                    <td><?php echo $row["pro_price"]; ?></td>
                    <td><?php echo $row["pro_details"]; ?></td>
                    <td><img style='width:50px;' src='upload/<?php echo $row["pro_image"]; ?>'/> </td>
                    <td><?php echo $row["subcat_name"]; ?></td>
                    <td><a href="?did=<?php echo $row['pro_id']; ?>">Delete</a> | <a href="edit-product.php?eid=<?php echo $row['pro_id']; ?>">Edit</a></td>
                    
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


