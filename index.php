<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

ob_start();
include("includes/config.php"); ?>
<!doctype html>
<html>
<head>
    <?php include("includes/headTags.php"); ?>
    <?php
    echo isset($_GET['logout']);
    if (isset($_GET['logout'])) {
        require_once "./assets/model/auth.php";
        $auth = new auth();
        $auth->clearCookies();
        unset($_COOKIE['member_login']);
        unset($_COOKIE['random_password']);
        unset($_COOKIE['random_selector']);
        print_r($_COOKIE);
        session_destroy();
        session_unset();
        header('Location: index.php');
    } ?>
    <link rel="stylesheet" href="assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="assets/css/util.css" type="text/css">
    <link rel="stylesheet" href="assets/css/animate.css" type="text/css">
</head>
<body>
<div class="se-pre-con" id="index-loader"></div>
<?php include("includes/navigation.php"); ?>
<!-- Header -->
<header id="home">
    <div class="bg-img" style="background-image: url('./assets/img/index-background.jpg');">
        <div class="overlay"></div>
    </div>

    <div class="home-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="home-content">
                        <h1 class="white-text">We Are UberKidz</h1>
                        <p class="white-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed iaculis
                            lobortis pharetra. Nullam convallis mi sem, ut facilisis risus consequat vitae. Sed sodales,
                            tortor non aliquam congue, ante orci rutrum enim.</p>
                        <a class="white-btn" id="get_started"
                           href="<?php if (isset($_SESSION['userInfo']['email_address'])) { ?>myAccount.php<?php } else { ?>login.php<?php } ?>">Get
                            Started</a>
                        <button class="main-btn">Learn more</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div id="about" class="section md-padding">

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="section-header text-center">
                <h2 class="title">Welcome to Uberkidz</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="about">
                    <i class="fas fa-map"></i>
                    <h3>Venues</h3>
                    <p>Select from our wide range of venues all across London.</p>
                    <a href="venues.php">Read more</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="about">
                    <i class="fas fa-gifts"></i>
                    <h3>Entertainment Packages</h3>
                    <p>Select for our wide range of tailor made entertainment packages for whatever the occasion is.</p>
                    <a href="events.php">Read more</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="about">
                    <i class="fab fa-elementor"></i>
                    <h3>Menus</h3>
                    <p>Select cuisine choices from various restaurants and caterers to match your taste bud needs.</p>
                    <a href="menus.php">Read more</a>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include("includes/footer.php"); ?>
</body>
<?php include("includes/scripts.php"); ?>
<script src="assets/js/index.js"></script>
</html>