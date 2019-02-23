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

                <div>
                <?php foreach ($_SESSION['cartItems'] as $key => $cartItem) { ?>
                        <div class="item">
                            <div class="buttons">
                               <button class="fas fa-times" id="<?=$key?>" onClick="delete_item(this.id)"></button>
                            </div>
                            <div class = "image">
                                <img src="./assets/uploads/event/<?= $cartItem['eventimage1'] ?>" alt="item1" width="160" height="100"/>
                            </div>
                            <div class="description">
                                <span><?= $cartItem['name'] ?></span>
                                <span><?= $cartItem['quality'] ?></span>
                            </div>
                            <div class="time">
                               Time
                            </div>
                            <div class="total-price">&#163;<?= $cartItem['price'] * $cartItem['quantity'] ?></div><br>
                        </div>
                <?php } ?>
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
						£ <?= $_SESSION['total_price'] ?>
					</span>
                </div>
                <div class="flex-w flex-sb-m p-l-30 m-t-20 m-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Discount
					</span>

                    <span class="m-text21 w-size20 w-full-sm">

					</span>
                </div>
                <div class="flex-w flex-sb-m p-l-30 m-t-20 m-b-20 bo10">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

                    <span class="m-text21 w-size20 w-full-sm">
						£
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

