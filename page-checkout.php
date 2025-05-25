<?php
session_start();
include "class/dbconnect.php";
include 'class/session-check.php';
if(isset($_POST["submit"]))
{
    $order_date=date("Y-m-d");
    $order_status="Pending";
    
    $order_total=mysqli_real_escape_string($conn,$_POST["order_total"]);
    
    $shipping_name=mysqli_real_escape_string($conn,$_POST["shipping_name"]);
    $shipping_mobile_no=mysqli_real_escape_string($conn,$_POST["shipping_mobile_no"]);
    $shipping_address=mysqli_real_escape_string($conn,$_POST["shipping_address"]);
    $payment_method=mysqli_real_escape_string($conn,$_POST["payment_method"]);
    
    $query_order_ins = mysqli_query($conn,"INSERT INTO `tbl_order`(`order_date`, `user_id`, `order_status`, `order_total`, `shipping_name`, `shipping_mobile_no`, `shipping_address`, `payment_method`) VALUES ('{$order_date}', '{$user_id}', '{$order_status}', '{$order_total}', '{$shipping_name}', '{$shipping_mobile_no}', '{$shipping_address}', '{$payment_method}')");
    if($query_order_ins)
    {
        $order_id=mysqli_insert_id($conn);
        $query = mysqli_query($conn, "select *from tbl_cart where user_id='{$user_id}'") or die(mysqli_error($conn));
        while ($cart_data = mysqli_fetch_array($query)) {
            $query_product = mysqli_query($conn, "SELECT * FROM `tbl_product` where pro_id='{$cart_data["pro_id"]}'");
            $product_data = mysqli_fetch_array($query_product);

            
            $pro_id = $product_data["pro_id"];
            $price = $product_data["pro_price"];
            $qty = $cart_data["total_qty"];

            $query_detail = mysqli_query($conn,"INSERT INTO `tbl_orderdetails`( `order_id`, `price`, `qty`, `pro_id`) VALUES ( '{$order_id}', '{$price}', '{$qty}', '{$pro_id}')");
            
        }

        $query_cart = mysqli_query($conn,"DELETE FROM `tbl_cart` WHERE `user_id`='{$user_id}'");
        if ($query_cart) {
        
            echo "<script>alert('Your Order added successfully');window.location='order-list.php';</script>";
        }

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
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->
    <!-- Single Page -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">Checkout
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
                        <th class="pro-thumbnail">Image</th>
                        <th class="pro-title">Product</th>
                        <th class="pro-price">Price</th>
                        <th class="pro-quantity">Quantity</th>
                        <th class="pro-subtotal">Total</th>
                        
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
                            <?php echo $total_qty; ?>

                            </td>
                            <td class="pro-subtotal"><span>Rs.<?php echo $sub_total; ?></span></td>
                            
                        </tr>

                    <?php } ?>

                    <tr>
                        <td colspan="3">

                        </td>
                        <td>Total</td>
                        <td>Rs.<?php echo $total;?></td>
                    </tr>

                </tbody>
            </table>
      
            <?php } else {
                                     echo "<script>alert('Please add some product in cart');window.location='cart-list.php';</script>";
                                } ?>
            <div class="clearfix"> </div>

            <div class="checkout-left">
				<div class="address_form_agile">
					<h4>Shipping Details</h4>
					<form action="page-checkout.php" method="post" class="creditly-card-form agileinfo_form">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls">
                                        <input type="hidden" name="order_total" value="<?php echo $total;?>">
										<input class="billing-address-name" type="text" name="shipping_name" id="shipping_name" placeholder="Full Name" value="<?php echo $user_name;?>" required="">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left">
											<div class="controls">
												<input type="text" placeholder="Mobile Number" name="shipping_mobile_no" id="shipping_mobile_no" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right">
											<div class="controls">
												<input type="text" placeholder="Address" name="shipping_address" id="shipping_address" required="">
											</div>
										</div>
										<div class="clear"> </div>
									</div>
									
									<div class="controls">
										<select class="option-w3ls" name="payment_method" id="payment_method" required>
											<option>Select Payment Method</option>
											<option>Cash</option>
											

										</select>
									</div>
								</div>
								<button type="submit" name="submit" class="submit check_out">Place Order</button>
							</div>
						</div>
					</form>
				
				</div>
				<div class="clearfix"> </div>
			</div>


        </div>
    </div>

    <?php
    include 'themepart-2/footer-script.php';
    ?>

</body>

</html>