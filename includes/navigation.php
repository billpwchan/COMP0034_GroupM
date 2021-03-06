<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

if (isset($_SESSION['userInfo'])) {
    include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/displayCart.php';
}
?>

<nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top" style="font-family: Montserrat-Regular, sans-serif;">
    <a class="navbar-brand" href="#">
        <i class="fas fa-glass-cheers"></i>
        UberKidz
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
            aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item <?php if ($CURRENT_PAGE == "Index") { ?>active<?php } ?>">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
            <li class="nav-item <?php if ($CURRENT_PAGE == "MyAccount") { ?>active<?php } ?>">
                <a class="nav-link"
                   href="<?php if (isset($_SESSION['userInfo']['email_address'])) { ?>myAccount.php<?php } else { ?>login.php<?php } ?> ">
                    <i class=" fas fa-user-circle"></i>
                    My Account
                </a>
            </li>
            <li class="nav-item <?php if ($CURRENT_PAGE == "Venues") { ?>active<?php } ?>">
                <a class="nav-link" href="venues.php">
                    <i class="fas fa-map"></i>
                    Venues
                </a>
            </li>
            <li class="nav-item <?php if ($CURRENT_PAGE == "EntertainmentPackages") { ?>active<?php } ?>">
                <a class="nav-link" href="events.php">
                    <i class="fas fa-gifts"></i>
                    Entertainment Packages
                </a>
            </li>
            <li class="nav-item <?php if ($CURRENT_PAGE == "Menus") { ?>active<?php } ?>">
                <a class="nav-link" href="menus.php">
                    <i class="fab fa-elementor"></i>
                    Menus
                </a>
            </li>
            <li class="nav-item <?php if ($CURRENT_PAGE == "ContactUs") { ?>active<?php } ?>">
                <a class="nav-link" href="contactUs.php">
                    <i class="fas fa-phone"></i>
                    Contact Us
                </a>
            </li>
            <li class="nav-item <?php if ($CURRENT_PAGE == "FAQ") { ?>active
            <?php } ?>">
                <a class="nav-link" href="FAQ.php">
                    <i class="fas fa-question-circle"></i>
                    FAQ
                </a>
            </li>
        </ul>

        <ul class="navbar-nav">
            <?php if (isset($_SESSION['userInfo']['email_address'])) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" id="dropdownMenuButton" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-secret"></i><?= $_SESSION['userInfo']['email_address'] ?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" id="logout">Logout</a>
                    </div>
                </li>
                <?php if (isset($_SESSION['customer'])) { ?>
                    <li class="nav-item"><a href="#" class="nav-link" id="cart"><i class="fa fa-shopping-cart"></i> Cart
                            <span
                                    class="badge"><?= sizeof($_SESSION['cartItems']) ?></span></a></li>
                <?php }
            } ?>
        </ul>
    </div>
</nav>
<?php if (isset($_SESSION['userInfo']['email_address']) and isset($_SESSION['customer'])) { ?>
    <div class="container">
        <div class="shopping-cart">
            <div class="shopping-cart-header">
                <i class="fa fa-shopping-cart cart-icon"></i><span
                        class="badge"><?= sizeof($_SESSION['cartItems']) ?></span>
                <div class="shopping-cart-total">
                    <span class="lighter-text">Total:</span>
                    <span class="main-color-text">&#163;
                    <?php $totalPrice = 0.0;
                    foreach ($_SESSION['cartItems'] as $cartItem) {
                        $totalPrice += (float)$cartItem['price'] * (int)$cartItem['quantity'];
                    }
                    $_SESSION['total_price'] = $totalPrice;
                    echo $totalPrice ?>
                </span>
                </div>
            </div>

            <ul class="shopping-cart-items">
                <?php foreach ($_SESSION['cartItems'] as $cartItem) { ?>
                    <li class="clearfix">
                        <img src="./assets/uploads/<?= $cartItem['event_type'] ?>/<?= $cartItem['eventimage1'] ?>"
                             alt="item1"
                             width="80"
                             height="60"/>
                        <span class="item-name"><?= $cartItem['name'] ?></span>
                        <span class="item-price">&#163;<?= $cartItem['price'] * $cartItem['quantity'] ?></span><br>
                        <span class="item-quantity">Quality: <?= $cartItem['quality'] ?></span>
                    </li>
                <?php } ?>
            </ul>
            <a href="shoppingCart.php" class="button">Checkout</a>
        </div>
    </div>
<?php } ?>
