<?php include("includes/config.php"); ?>
<!doctype html>
<html>
<head>
    <?php include("includes/headTags.php"); ?>
    <link rel="stylesheet" href="assets/css/menus.css" type="text/css">
    <link rel="stylesheet" href="assets/css/util.css" type="text/css">
</head>
<body>
<?php include("includes/navigation.php"); ?>
<br>
<section class="banner-area relative" id="home">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-start banner-text">
            <div class="banner-content col-lg-8 col-md-12">
                <h4 class="text-white text-uppercase">Wide Options of Choice</h4>
                <h1>
                    Menus
                </h1>
                <p class="text-white">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp <br> or incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim.
                </p>
                <a href="#" class="primary-btn header-btn text-uppercase">Check Our Menu</a>
            </div>
        </div>
    </div>
</section>
<div class="container product" id="product-display">
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#">
                        <img class="pic-1" src="./assets/img/event-preview1.jpg" alt="Preview Image 1">
                        <img class="pic-2" src="./assets/img/event-preview2.jpg" alt="Preview Image 2">
                    </a>
                    <ul class="function">
                        <li><a href="" data-tip="Details"><i class="fas fa-search"></i></a></li>
                        <li><a href="" data-tip="Add to Shopping Cart"><i class="fas fa-shopping-cart"></i></a></li>
                    </ul>
                    <a href="#" class="select-options"><i class="fas fa-arrow-right"></i> Select Options</a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Menu 1</a></h3>
                    <div class="price">
                        $14.40
                        <span>$16.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#">
                        <img class="pic-1" src="./assets/img/event-preview1.jpg" alt="Preview Image 1">
                        <img class="pic-2" src="./assets/img/event-preview2.jpg" alt="Preview Image 2">
                    </a>
                    <ul class="function">
                        <li><a href="" data-tip="Details"><i class="fas fa-search"></i></a></li>
                        <li><a href="" data-tip="Add to Shopping Cart"><i class="fas fa-shopping-cart"></i></a></li>
                    </ul>
                    <a href="#" class="select-options"><i class="fas fa-arrow-right"></i> Select Options</a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Menu 2</a></h3>
                    <div class="price">
                        $14.40
                        <span>$16.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#">
                        <img class="pic-1" src="./assets/img/event-preview1.jpg" alt="Preview Image 1">
                        <img class="pic-2" src="./assets/img/event-preview2.jpg" alt="Preview Image 2">
                    </a>
                    <ul class="function">
                        <li><a href="" data-tip="Details"><i class="fas fa-search"></i></a></li>
                        <li><a href="" data-tip="Add to Shopping Cart"><i class="fas fa-shopping-cart"></i></a></li>
                    </ul>
                    <a href="#" class="select-options"><i class="fas fa-arrow-right"></i> Select Options</a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Menu 3</a></h3>
                    <div class="price">
                        $14.40
                        <span>$16.00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>
</body>
<?php include("includes/scripts.php"); ?>
</html>