<?php
session_start();
include "class/dbconnect.php";
include 'class/session-check.php';
if (isset($_GET["id"])) {
    $order_id = $_GET["id"];

    $query_order = mysqli_query($conn, "SELECT * FROM `tbl_order` where order_id='{$order_id}' order by order_id desc");
    $count_order = mysqli_num_rows($query_order);
    if ($count_order > 0) {
        $order_data = mysqli_fetch_array($query_order);
    } else {
        header("location:order-list.php");
    }
} else {
    header("location:order-list.php");
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Grocery Shoppy an Ecommerce Category Bootstrap Responsive Web Template | Single :: w3layouts</title>
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <?php
    include 'themepart-2/header-script.php';
    ?>
</head>

<body>
    <!-- header-bot-->
    <?php
    include "themepart-2/header.php";
    ?>
    <!-- page -->
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="index.php">Home</a>
                        <i>|</i>
                    </li>
                    <li>Order Detail</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->
    <!-- Single Page -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">Order Detail
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3>
            <!-- //tittle heading -->
            <table class="table table-bordered">
                <thead>
                    <tr>


                        <th class="pro-title">Order No</th>
                        <th class="pro-price">Order Date</th>
                        <th class="pro-quantity">Total</th>
                        <th class="pro-subtotal">Payment Method</th>
                        <th class="pro-subtotal">Status</th>

                    </tr>
                </thead>
                <tbody>

                    <tr>


                        <td class="pro-title">#order-<?php echo $order_data["order_id"]; ?></td>
                        <td class="pro-price"><?php echo date("d-m-Y", strtotime($order_data["order_date"])); ?></td>
                        <td class="pro-quantity">Rs.<?php echo $order_data["order_total"]; ?></td>
                        <td class="pro-subtotal"><?php echo $order_data["payment_method"]; ?></td>
                        <td><?php echo $order_data["order_status"]; ?></td>

                    </tr>




                </tbody>
            </table>

            <table class="table order-details-table" border="1">
                <thead>
                    <tr>
                        <td colspan="2" >Billing Information</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Shipping Name</th>
                        <td><?php echo $order_data["shipping_name"]; ?></td>
                    </tr>

                    <tr>
                        <th>Mobile No</th>
                        <td><?php echo $order_data["shipping_mobile_no"]; ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?php echo $order_data["shipping_address"]; ?></td>
                    </tr>

                </tbody>

            </table>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="pro-thumbnail">Image</th>
                        <th class="pro-title">Product</th>
                        <th class="pro-price">Price</th>
                        <th class="pro-quantity">Quantity</th>
                        <th class="pro-subtotal">Total</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    $query = mysqli_query($conn, "select *from tbl_orderdetails where order_id='{$order_id}'") or die(mysqli_error($conn));
                    while ($data = mysqli_fetch_array($query)) {
                        $query_product = mysqli_query($conn, "SELECT * FROM `tbl_product` where pro_id='{$data["pro_id"]}'");
                        $product_data = mysqli_fetch_array($query_product);

                        $pro_name = $product_data["pro_name"];
                        $pro_image = $product_data["pro_image"];
                        $prod_price = $data["price"];
                        $order_qty = $data["qty"];
                        $sub_total = $order_qty * $prod_price;
                        $total += $sub_total;
                    ?>
                        <tr>
                            <td class="pro-thumbnail"><img class="img-fluid" src="admin/upload/<?php echo $pro_image; ?>" style="width:50px;" alt="Product" /></td>
                            <td class="pro-title"><?php echo $pro_name; ?></td>
                            <td class="pro-price"><span>Rs.<?php echo $prod_price; ?></span></td>
                            <td>

                                <?php echo $order_qty; ?>

                            </td>
                            <td class="pro-subtotal"><span>Rs.<?php echo $sub_total; ?></span></td>

                        </tr>

                    <?php } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>Rs.<?php echo $total; ?></td>
                    </tr>


                </tbody>
            </table>
            <div class="clearfix"> </div>




        </div>
    </div>

    <?php
    include 'themepart-2/footer-script.php';
    ?>

</body>

</html>