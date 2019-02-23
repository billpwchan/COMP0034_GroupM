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

                <!-- Product #1 -->
                <div class="item">
                    <div class="buttons">
                        <i class="fas fa-times"></i>
                        <i class="fas fa-heart"></i>
                    </div>

                    <div class="image">
                        <img src="./assets/uploads/<?= $cartItem['event_type'] ?>/<?= $cartItem['eventimage1'] ?>"
                             alt="Product Pic"
                             width="100"
                             height="80"/>
                    </div>

                    <div class="description">
                        <span>Common Projects</span>
                        <span>Bball High</span>
                        <span>White</span>
                    </div>

                    <div class="quantity">
                        <button class="minus-btn" type="button" name="button">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input type="text" name="name" value="1">
                        <button class="plus-btn" type="button" name="button">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>

                    <div class="total-price">$549</div>
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

