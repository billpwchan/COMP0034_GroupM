<?php include("includes/config.php"); ?>
<!doctype html>
<html>
<head>
    <?php include("includes/headTags.php"); ?>
    <link rel="stylesheet" href="assets/css/shoppingCart.css" type="text/css">
    <link rel="stylesheet" href="assets/css/util.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-grid.css">
    <link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-theme-balham.css">
    <script src="https://unpkg.com/ag-grid-community/dist/ag-grid-community.min.noStyle.js"></script>
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
                <!--                <button onclick="getSelectedRows()">Get Selected Rows</button>
                                <div id="myGrid" class="ag-theme-balham"></div>-->


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
                            <div class="total-price" id="item_price<?=$key?>">
                                <span <?php if (isset($_SESSION['discount'])){ ?>class="original_price"<?php } ?>>£ <?= $cartItem['price']?></span>
                                <?php if (isset($_SESSION['discount'])){ ?>
                                    <span class="discount_percentage"><?= $_SESSION['discount']?>% off</span>
                                    <span>£ <?= $cartItem['price'] * (1 - $_SESSION['discount']/100) ?></span>
                                <?php } ?>
                            </div><br>
                        </div>
                <?php } ?>
                </div>

                <div class="container-fluid checkout-container">
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" class="form-control voucher-input" id="voucher_code"
                                   placeholder="Enter Voucher">
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-info voucher-btn" type="submit" id="apply_voucher" name="action"
                                    value="checkout">Apply Coupon
                            </button>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-right">
                                <button class="btn btn-success checkout-btn" type="submit" id="checkout" name="action"
                                        value="checkout">Proceed to checkout
                                </button>
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

                    <span class="m-text21 w-size20 w-full-sm" id="total_price">
						£ <?= $_SESSION['total_price'] ?>
					</span>
                </div>
                <div class="flex-w flex-sb-m p-l-30 m-t-20 m-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Discount
					</span>
                    <span class="m-text21 w-size20 w-full-sm" id="discount">
                        £ <?= $_SESSION['total_price'] * $_SESSION['discount']/100?>
					</span>
                </div>
                <div class="flex-w flex-sb-m p-l-30 p-t-15 p-b-15 m-t-20 m-b-20 bo10">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>
                    <span class="m-text21 w-size20 w-full-sm">
						 £ <?= $_SESSION['total_price'] * ( 1 -  $_SESSION['discount']/100) ?>
					</span>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<?php include("includes/scripts.php"); ?>
<script src="assets/js/shoppingCart.js"></script>
<?php
if (isset($_GET['status']) and $_GET['status'] === 'success') { ?>
    <script> Swal.fire({
            title: 'Order Complete',
            animation: false,
            customClass: 'animated tada',
            text: "Thanks for purchasing on UberKidz",
            type: 'success'
        });
    </script>
<?php } elseif (isset($_GET['status']) and $_GET['status'] === 'insufficientBalance') { ?>
    <script> Swal.fire({
            title: 'Order Failed',
            animation: false,
            customClass: 'animated tada',
            text: "Insufficient Balance Detected. Please Add More Fund Into your Account",
            type: 'error'
        });
    </script>
<?php } ?>
</html>

