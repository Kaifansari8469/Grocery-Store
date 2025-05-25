<?php
session_start();
include "class/dbconnect.php";
include 'class/session-check.php';
if (isset($_POST["cart_delete"])) {

    $cart_id = mysqli_real_escape_string($conn, $_POST["cart_id"]);
    $query = mysqli_query($conn, "DELETE FROM `tbl_cart` WHERE `cart_id`='{$cart_id}'");
    if ($query) {
        
        echo "<script>alert('Your product removed to cart successfully');window.location='cart-list.php';</script>";
    }

    
    exit();
}
if (isset($_POST["cart_update"])) {

    $cart_id = mysqli_real_escape_string($conn, $_POST["cart_id"]);
    $total_qty = mysqli_real_escape_string($conn, $_POST["total_qty"]);
    $query = mysqli_query($conn, "UPDATE `tbl_cart` SET `total_qty`='{$total_qty}' WHERE `cart_id`='{$cart_id}'");
    if ($query) {
        
        echo "<script>alert('Your product updated to cart successfully');window.location='cart-list.php';</script>";
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
                    <li>Cart</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->
    <!-- Single Page -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">Cart
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3>
            <!-- //tittle heading -->
            <?php
                                $query = mysqli_query($conn, "select *from tbl_cart where user_id='{$user_id}'") or die(mysqli_error($conn));

                                $count = mysqli_num_rows($query);

                                if ($count > 0) {

                                ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="pro-thumbnail">Thumbnail</th>
                        <th class="pro-title">Product</th>
                        <th class="pro-price">Price</th>
                        <th class="pro-quantity">Quantity</th>
                        <th class="pro-subtotal">Total</th>
                        <th class="pro-remove">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $total = "0";
                    while ($cart_data = mysqli_fetch_array($query)) {
                        $query_product = mysqli_query($conn, "SELECT * FROM `tbl_product` where pro_id='{$cart_data["pro_id"]}'");
                        $product_data = mysqli_fetch_array($query_product);

                        $pro_image = $product_data["pro_image"];
                        $pro_name = $product_data["pro_name"];
                        $pro_price = $product_data["pro_price"];
                        $total_qty = $cart_data["total_qty"];
                        $sub_total = $pro_price * $total_qty;
                        $total += $sub_total;
                    ?>
                        <tr>
                            <td class="pro-thumbnail"><img class="img-fluid" src="admin/upload/<?php echo $pro_image; ?>" style="width:100px;" alt="Product" /></td>
                            <td class="pro-title"><?php echo $pro_name; ?></td>
                            <td class="pro-price"><span>Rs.<?php echo $pro_price; ?></span></td>
                            <td>

                                <div class="pro-qty">
                                    <form method="post" action="cart-list.php" style="display:inline-block;">
                                        <input type="hidden" name="cart_id" value="<?php echo $cart_data["cart_id"]; ?>">
                                        <input type="number" min="1" max="5" name="total_qty" value="<?php echo $total_qty; ?>">
                                        <button type="submit" class="btn btn-primary" name="cart_update">Update</button>
                                    </form>
                                </div>

                            </td>
                            <td class="pro-subtotal"><span>Rs.<?php echo $sub_total; ?></span></td>
                            <td>
                                <form method="post" action="cart-list.php">

                                    <input type="hidden" name="cart_id" value="<?php echo $cart_data["cart_id"]; ?>">
                                    <button type="submit" class="btn btn-danger" name="cart_delete">Delete</button>
                                </form>
                            </td>
                        </tr>

                    <?php } ?>


                </tbody>
            </table>
            <a href="product-listing.php" class="btn btn-primary">Back To Shop</a>
                        <a href="page-checkout.php" class="btn btn-info">Proceed To Checkout</a>
            <?php } else {
                                    echo "<h1>Sorry, Your cart is empty</h1>";
                                } ?>
            <div class="clearfix"> </div>
        </div>
    </div>

    <?php
    include 'themepart-2/footer-script.php';
    ?>

</body>

</html>