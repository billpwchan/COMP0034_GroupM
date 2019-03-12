<?php include("includes/config.php"); ?>
<?php include("./assets/controllers/events.php") ?>
<!doctype html>
<html>
<head>
    <?php include("includes/headTags.php"); ?>
    <link rel="stylesheet" href="assets/css/events.css" type="text/css">
    <link rel="stylesheet" href="assets/css/util.css" type="text/css">
</head>
<body>
<?php include("includes/navigation.php"); ?>


<section class="banner-area relative" id="home">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-start banner-text">
            <div class="banner-content col-lg-8 col-md-12">
                <h4 class="text-white text-uppercase">Wide Options of Choice</h4>
                <h1>
                    Entertainment Packages
                </h1>
                <p class="text-white">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp <br> or incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim.
                </p>
                <a href="#product-display" class="primary-btn header-btn text-uppercase">Check Our
                    Event</a>
            </div>
        </div>
    </div>
</section>

<div class="container product" id="product-display">
    <div class="row">
        <div class="searchbar">
            <input class="search_input" id="search_input" type="text" name="searchName"
                   placeholder="Search for Event Name..."
                   value="<?= isset($_GET['searchKey']) ? $_GET['searchKey'] : "" ?>">
            <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
        </div>
        <?php if (isset($_GET['searchKey']) && $_GET['searchKey'] !== "") { ?>
            <button type="button" class="btn btn-dark clear-button">Clear</button>
        <?php } ?>
    </div>
    <div class="row">
        <?php for ($i = 0; $i < min($records_per_page, $row_count_entertainment - $records_per_page * ($page - 1)); $i++) { ?>
            <div class="col-md-4 col-sm-6">
                <form class="product-grid">
                    <div class='product-id display-none'><?= $entertainments[$i]['event_ID'] ?></div>
                    <div class="product-image">
                        <a href="eventDetail.php?id=<?= $entertainments[$i]['event_ID'] ?>&from=events">
                            <img class="pic-1"
                                 src="./assets/uploads/entertainment/<?= $entertainments[$i]['eventimage1'] ?>"
                                 alt="Preview Image 1">
                            <img class="pic-2"
                                 src="./assets/uploads/entertainment/<?= $entertainments[$i]['eventimage2'] ?>"
                                 alt="Preview Image 2">
                        </a>
                        <ul class="function">
                            <li><a href="" data-tip="Details" class="detail"><i class="fas fa-search"></i></a></li>
                            <li>
                                <a>
                                    <button type="submit" data-tip="Add to Shopping Cart" class="add-to-cart">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                            </li>
                        </ul>
                        <a href="#" class="select-options"><i class="fas fa-arrow-right"></i> Select Options</a>
                    </div>
                    <div class="product-content">
                        <h3 class="title">
                            <a href="eventDetail.php?id=<?= $entertainments[$i]['event_ID'] ?>&from=events"><?= $entertainments[$i]['name'] ?></a>
                        </h3>
                        <div class="price">
                            &#163;<?= $entertainments[$i]['price'] ?>
                            <span>&#163;<?= (round((float)$entertainments[$i]['price'] * 1.5, 2)) ?></span>
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link"
                           <?php if (($page - 1) >= 1) { ?>href="events.php?page=<?= $page - 1 ?>" <?php } ?>
                           aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= ceil($row_count_entertainment / $records_per_page); $i++) { ?>
                        <li class="page-item"><a class="page-link" href="events.php?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php } ?>
                    <li class="page-item">
                        <a class="page-link"
                           <?php if (($page + 1) <= ceil($row_count_entertainment / $records_per_page)) { ?>href="events.php?page=<?= $page + 1 ?>" <?php } ?>
                           aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>
</body>
<?php include("includes/scripts.php"); ?>
<script src="assets/js/events.js"></script>
<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */
if (isset($_GET['addtocart']) && $_GET['addtocart'] === 'success') { ?>
    <script> Swal.fire({
            title: 'Successful',
            animation: false,
            customClass: 'animated tada',
            text: "An item has successfully added to your cart",
            type: 'success'
        });
    </script>
<?php } else if (isset($_GET['display']) && $_GET['display'] === 'invalid') { ?>
    <script> Swal.fire({
            title: 'Invalid Product',
            animation: false,
            customClass: 'animated tada',
            text: "Cannot Display Product Detail, Please contact Administrator for Assistance.",
            type: 'error'
        });
    </script>
<?php } elseif (isset($_GET['addtocart']) && $_GET['addtocart'] === 'overlappedBooking') { ?>
    <script> Swal.fire({
            title: 'Failed',
            animation: false,
            customClass: 'animated tada',
            text: "Invalid Booking TimeSlot.",
            type: 'error'
        });
    </script>
<?php } elseif (isset($_GET['addtocart']) && $_GET['addtocart'] === 'duplicateInCart') { ?>
    <script> Swal.fire({
            title: 'Duplicate Entry in Cart',
            animation: false,
            customClass: 'animated tada',
            text: "The service with specified quality level is already added in your cart",
            type: 'error'
        });
    </script>
<?php } ?>
</html>