<?php include("includes/config.php"); ?>
<!doctype html>
<html>
<head>
    <?php include("includes/headTags.php"); ?>
    <link rel="stylesheet" href="assets/css/shoppingCart.css" type="text/css">
    <link rel="stylesheet" href="assets/css/util.css" type="text/css">
</head>
<body>
<?php include("includes/navigation.php"); ?>

<div class="container-fluid shopping-cart-container">
    <div class="row">
        <div class="col-sm-8">
            <div class="shopping-cart-page">
                <!-- Title -->
                <div class="title">
                    Shopping Bag
                </div>

                <!-- Product #1 -->
                <div class="item">
                    <div class="buttons">
                        <i class="fas fa-times"></i>
                        <i class="fas fa-heart"></i>
                    </div>

                    <div class="image">
                        <img src="./assets/img/item-1.png" alt=""/>
                    </div>

                    <div class="description">
                        <span>Common Projects</span>
                        <span>Bball High</span>
                        <span>White</span>
                    </div>

                    <div class="total-price">$549</div>
                </div>

                <!-- Product #2 -->
                <div class="item">
                    <div class="buttons">
                        <i class="fas fa-times"></i>
                        <i class="fas fa-heart"></i>
                    </div>

                    <div class="image">
                        <img src="./assets/img/item-2.png" alt=""/>
                    </div>

                    <div class="description">
                        <span>Maison Margiela</span>
                        <span>Future Sneakers</span>
                        <span>White</span>
                    </div>


                    <div class="total-price">$870</div>
                </div>

                <!-- Product #3 -->
                <div class="item">
                    <div class="buttons">
                        <i class="fas fa-times"></i>
                        <i class="fas fa-heart"></i>
                    </div>

                    <div class="image">
                        <img src="./assets/img/item-3.png" alt=""/>
                    </div>

                    <div class="description">
                        <span>Our Legacy</span>
                        <span>Brushed Scarf</span>
                        <span>Brown</span>
                    </div>

                    <div class="total-price">$349</div>
                </div>
                <div class="container-fluid checkout-container">
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" class="form-control voucher-input" id="voucher_code" placeholder="Enter Voucher">
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-info voucher-btn" type="submit" id="apply_voucher">Apply Coupon</button>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-right">
                                <button class="btn btn-success checkout-btn" type="submit">Proceed to checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="shopping-cart-page">
                <div class="title">
                    Summary
                </div>
                <div class="flex-w flex-sb-m p-l-30 m-t-20 m-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

                    <span class="m-text21 w-size20 w-full-sm">
						$39.00
					</span>
                </div>
                <div class="flex-w flex-sb-m p-l-30 m-t-20 m-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Discount
					</span>

                    <span class="m-text21 w-size20 w-full-sm">
						$39.00
					</span>
                </div>
                <div class="flex-w flex-sb-m p-l-30 m-t-20 m-b-20 bo10">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

                    <span class="m-text21 w-size20 w-full-sm">
						$39.00
					</span>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<?php include("includes/scripts.php"); ?>
<script src="assets/js/shoppingCart.js"></script>
</html>

