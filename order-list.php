<?php
session_start();
include "class/dbconnect.php";
include 'class/session-check.php';
if (isset($_POST["order_update"])) {

    $order_id = mysqli_real_escape_string($conn, $_POST["order_id"]);
    
    $query = mysqli_query($conn, "UPDATE `tbl_order` SET `order_status`='Cancelled' WHERE `order_id`='{$order_id}'");
    if ($query) {
        echo "<script>alert('Your order cancelled successfully');window.location='order-list.php';</script>";
    }

    
    exit();
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
                    <li>My Order</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->
    <!-- Single Page -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">My Order
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3>
            <!-- //tittle heading -->
            <?php
            $query = mysqli_query($conn, "select *from tbl_order where user_id='{$user_id}' order by order_id desc") or die(mysqli_error($conn));

            $count = mysqli_num_rows($query);

            if ($count > 0) {

            ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Srno</th>

                            <th class="pro-title">Order No</th>
                            <th class="pro-price">Order Date</th>
                            <th class="pro-quantity">Total</th>
                            <th class="pro-subtotal">Payment Method</th>
                            <th class="pro-subtotal">Status</th>
                            <th class="pro-remove">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $total = "0";
                        while ($order_data = mysqli_fetch_array($query)) {

                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>

                                <td class="pro-title">#order-<?php echo $order_data["order_id"]; ?></td>
                                <td class="pro-price"><?php echo date("d-m-Y", strtotime($order_data["order_date"])); ?></td>
                                <td class="pro-quantity">Rs.<?php echo $order_data["order_total"]; ?></td>
                                <td class="pro-subtotal"><?php echo $order_data["payment_method"]; ?></td>
                                <td><?php echo $order_data["order_status"]; ?></td>
                                <td>
                                    <div>
                                        <a href="order-detail.php?id=<?php echo $order_data["order_id"]; ?>" class="btn btn-primary">View Detail</a>
                                        <?php
                                        if ($order_data["order_status"] == "Pending") {
                                        ?>
                                            <form method="post" action="order-list.php" style="display:inline-block;">

                                                <input type="hidden" name="order_id" value="<?php echo $order_data["order_id"]; ?>">
                                                <button type="submit" class="btn btn-danger" name="order_update">Cancel</button>
                                            </form>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>

                        <?php } ?>


                    </tbody>
                </table>

            <?php } else {
                echo "<h1>No Order Found</h1>";
            } ?>
            <div class="clearfix"> </div>




        </div>
    </div>

    <?php
    include 'themepart-2/footer-script.php';
    ?>

</body>

</html>