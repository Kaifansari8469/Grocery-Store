<?php
session_start();
include "class/dbconnect.php";
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Index</title>
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
	<!-- top-header -->
    <?php
    include "themepart-2/header.php";
    ?>
	<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<h3>Welcome To
							<span>Grocery</span>
						</h3>
						<p>
							<span></span> </p>
						<a class="button2" href="product.html">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<h3>Healthy
							<span>Grains</span>
						</h3>
						<p>
							<span></span></p>
						<a class="button2" href="product.html">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						<h3>Best Quality
							<span>Dry fruits</span>
						</h3>
						<p>
							<span></span>
						</p>
						<a class="button2" href="product.html">Shop Now </a>
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- //banner -->

	
	<!-- top products -->
	
	<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Products
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- product left -->
			<div class="side-bar col-md-3">
				<div class="search-hotel">
					<h3 class="agileits-sear-head">Search Here..</h3>
					<form action="#" method="post">
						<input type="search" placeholder="Product name..." name="search" required="">
						<input type="submit" value=" ">
					</form>
				</div>
				<!-- price range -->

				<!-- //price range -->
				<!-- food preference -->

				<!-- //food preference -->
				<!-- discounts -->
				<div class="left-side">
					<h3 class="agileits-sear-head">Discount</h3>
					<ul>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">5% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">10% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">20% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">30% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">50% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">60% or More</span>
						</li>
					</ul>
				</div>
				<!-- //discounts -->
				<!-- reviews -->

				<div class="left-side">
					<h3 class="agileits-sear-head">Cuisine</h3>
					<ul>
						<li>
							<?php

							$qq = mysqli_query($conn, "select * from tbl_subcat");
							while ($mydata = mysqli_fetch_array($qq)) {
								echo "<li><span class='span'><a href='?sid={$mydata['subcat_id']}'>{$mydata['subcat_name']}</a></span></li>";
							}
							?>
							<span class="span">South American</span>
						</li>

					</ul>
				</div>
				<!-- //cuisine -->
				<!-- deals -->
			</div>
			<!-- //product left -->
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-9 w3l-rightpro">

				<!-- first section -->

				<div class="wrapper">

					<div class="product-sec1">
						<?php

						if (isset($_GET['sid'])) {
							$sid = $_GET['sid'];
							$q = mysqli_query($conn, "select * from tbl_product where subcat_id ='{$sid}' ");
						} else {
							$q = mysqli_query($conn, "select * from tbl_product ");
						}
						while ($row = mysqli_fetch_array($q)) {

						?>
							<div class="col-xs-4 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="admin/upload/<?php echo $row['pro_image']; ?>" style="widht:100px;height:100px;" alt="">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="product-details.php?pid=<?php echo $row['pro_id'] ?>" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
									</div>
									<div class="item-info-product ">
										<h4>
											<a href="product-details.php?pid=<?php echo $row['pro_id']; ?>"><?php echo $row['pro_name']; ?> </a>
										</h4>
										<div class="info-product-price">
											<span class="item_price">Rs.<?php echo $row['pro_price']; ?></span>

										</div>
										<!-- <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										<form action="#" method="post">
											<fieldset>
												<input type="hidden" name="cmd" value="_cart" />
												<input type="hidden" name="add" value="1" />
												<input type="hidden" name="business" value=" " />
												<input type="hidden" name="item_name" value="Zeeba Basmati Rice - 5 KG" />
												<input type="hidden" name="amount" value="950.00" />
												<input type="hidden" name="discount_amount" value="1.00" />
												<input type="hidden" name="currency_code" value="USD" />
												<input type="hidden" name="return" value=" " />
												<input type="hidden" name="cancel_return" value=" " />
												<input type="submit" name="submit" value="Add to cart" class="button" />
											</fieldset>
										</form>
									</div> -->

									</div>
								</div>
							</div>


						<?php
						}
						?>
					</div>

				</div>
				<div class="clearfix"></div>

				<!-- //first section -->


			</div>
		</div>
		<!-- //product right -->
	</div>

	<?php
    include 'themepart-2/footer-script.php';
    ?>
	<script>
		//<![CDATA[ 
		$(window).load(function () {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [50, 6000],
				slide: function (event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

		}); //]]>
	</script>
</body>

</html>