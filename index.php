<?php
ob_start();
include("includes/config.php"); ?>
<!doctype html>
<html>
<head>
    <?php include("includes/headTags.php"); ?>
    <?php
    if (isset($_GET['logout'])) {
        include_once "./assets/model/auth.php";
        $auth = new auth();
        $auth->clearCookies();
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
                        <p class="white-text">Concerns greatest margaret him absolute entrance nay. Door neat week do
                            find past he. Be no surprise he honoured indulged. Unpacked endeavor six steepest had
                            husbands h</p>
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
                <h2 class="title">Welcome to Website</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="about">
                    <i class="fas fa-map"></i>
                    <h3>Venues</h3>
                    <p>Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero sit amet.</p>
                    <a href="#">Read more</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="about">
                    <i class="fas fa-gifts"></i>
                    <h3>Entertainment Packages</h3>
                    <p>Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero sit amet.</p>
                    <a href="#">Read more</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="about">
                    <i class="fab fa-elementor"></i>
                    <h3>Menus</h3>
                    <p>Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero sit amet.</p>
                    <a href="#">Read more</a>
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