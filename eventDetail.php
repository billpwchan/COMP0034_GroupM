<?php include("includes/config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/headTags.php"); ?>
    <link rel="stylesheet" href="assets/css/eventDetail.css" type="text/css">
</head>
<body>
<?php include("includes/navigation.php");?>

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

            <!-- Product Color -->
            <!--            <div class="product-color">
                            <span>Color</span>

                            <div class="color-choose">
                                <div>
                                    <input data-image="red" type="radio" id="red" name="color" value="red" checked>
                                    <label for="red"><span></span></label>
                                </div>
                                <div>
                                    <input data-image="blue" type="radio" id="blue" name="color" value="blue">
                                    <label for="blue"><span></span></label>
                                </div>
                                <div>
                                    <input data-image="black" type="radio" id="black" name="color" value="black">
                                    <label for="black"><span></span></label>
                                </div>
                            </div>

                        </div>-->

            <!-- Cable Configuration -->
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
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="assets/js/eventDetail.js" charset="utf-8"></script>
</html>