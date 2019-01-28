<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/headTags.php"); ?>
    <link rel="stylesheet" href="assets/css/eventDetail.css" type="text/css">
    <link rel="stylesheet" href="assets/css/util.css" type="text/css">
</head>
<body>
<?php include("includes/navigation.php"); ?>

<main class="container-fluid product-form">

    <!-- Left Column / Headphones Image -->
    <div class="left-column col-lg-6">
        <img data-image="basic" src="./assets/img/basic-entertainment.jpg" alt="">
        <img data-image="advanced" src="./assets/img/advanced-entertainment.jpg" alt="">
        <img data-image="premium" class="active" src="./assets/img/premium-entertainment.jpg" alt="">
    </div>


    <!-- Right Column -->
    <div class="right-column col-lg-6">

        <!-- Product Description -->
        <div class="product-description">
            <span class="product-description-general">Entertainment Package</span>
            <h1 class="product-description-title">Sample Entertainment 1</h1>
            <p class="product-description-content">Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut
                labore et dolore magna aliquyam
                erat, At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, no sea
                takimata sanctus est Lorem ipsum dolor sit amet.</p>
        </div>

        <!-- Product Configuration -->
        <div class="product-configuration">
            <div class="service-config">
                <span>Service Quality</span>

                <div class="service-choose">
                    <button class="basic">Regular</button>
                    <button class="advanced">Premium</button>
                    <button class="premium">Luxury</button>
                </div>

                <a href="#">Encounter a problem? No Problem, just contact us</a>
            </div>
        </div>

        <!-- Product Pricing -->
        <div class="product-price">
            <span class="product-price-value">&#163;100</span>
            <a href="#" class="cart-btn">Add to cart</a>
        </div>
    </div>
</main>
<?php include("includes/footer.php"); ?>
</body>
<?php include("includes/scripts.php"); ?>
<script src="assets/js/eventDetail.js" charset="utf-8"></script>
</html>