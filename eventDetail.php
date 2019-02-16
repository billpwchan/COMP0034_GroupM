<?php include("includes/config.php"); ?>
<?php include("./assets/controllers/eventDetail.php") ?>

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
        <img data-image="basic" src="./assets/uploads/event/<?= $productDetails['eventimage1'] ?>" alt="">
        <img data-image="advanced" src="./assets/uploads/event/<?= $productDetails['eventimage2'] ?>" alt="">
        <img data-image="premium" class="active" src="./assets/uploads/event/<?= $productDetails['eventimage3'] ?>"
             alt="">
    </div>


    <!-- Right Column -->
    <div class="right-column col-lg-6">

        <!-- Product Description -->
        <div class="product-description">
            <span class="product-description-general"><?= $productDetails['event_type'] ?></span>
            <h1 class="product-description-title"><?= $productDetails['name'] ?></h1>
            <p class="product-description-content"><?= $productDetails['description'] ?></p>
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

                <a href="contactUs.php">Encounter a problem? No Problem, just contact us</a>
            </div>
        </div>

        <!-- Product Pricing -->
        <div class="product-price">
            <span class="product-price-value">&#163;<?= $productDetails['price'] ?></span>
            <a
                <?php if (isset($_SESSION['userInfo'])) { ?>
                    href="./assets/controllers/addToCart.php?id=<?= $productID ?>&from=eventDetails"
                <?php } else { ?>
                    href="login.php"
                <?php } ?>
                    class="cart-btn">Add to cart
            </a>
        </div>
    </div>
</main>
<?php include("includes/footer.php"); ?>
</body>
<?php include("includes/scripts.php"); ?>
<script src="assets/js/eventDetail.js" charset="utf-8"></script>
</html>