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
                   href="<?php if (isset($_SESSION['email']) and $_SESSION['login_status'] == 1) { ?> index.php <?php } else { ?> login.php <?php } ?> ">
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
        </ul>
        <!--        <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="inputSearch">
                <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="search">Search</button>
                </form>-->
        <ul class="navbar-nav">
            <?php
            if (isset($_SESSION['email']) and $_SESSION['login_status'] == 1) {
                ?>
                <li class="nav-item">
                    <button class="nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i
                                class="fas fa-user-secret"></i><?= $_SESSION['email'] ?></button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" id="logout" href="index.php?logout=true">Logout</a>
                    </div>
                </li>
            <?php } ?>
            <li class="nav-item"><a href="#" class="nav-link" id="cart"><i class="fa fa-shopping-cart"></i> Cart <span
                            class="badge">3</span></a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="shopping-cart">
        <div class="shopping-cart-header">
            <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
            <div class="shopping-cart-total">
                <span class="lighter-text">Total:</span>
                <span class="main-color-text">$2,229.97</span>
            </div>
        </div>

        <ul class="shopping-cart-items">
            <li class="clearfix">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="item1"/>
                <span class="item-name">Product 1</span>
                <span class="item-price">$849.99</span>
                <span class="item-quantity">Quantity: 01</span>
            </li>
            <li class="clearfix">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="item1"/>
                <span class="item-name">Product 2</span>
                <span class="item-price">$849.99</span>
                <span class="item-quantity">Quantity: 01</span>
            </li>
            <li class="clearfix">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="item1"/>
                <span class="item-name">Product 2</span>
                <span class="item-price">$849.99</span>
                <span class="item-quantity">Quantity: 01</span>
            </li>
        </ul>
        <a href="#" class="button">Checkout</a>
    </div>
</div>
