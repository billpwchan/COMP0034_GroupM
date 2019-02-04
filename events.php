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
                <a href="#product-display" class="primary-btn header-btn text-uppercase">Check Our Event</a>
            </div>
        </div>
    </div>
</section>

<div class="container product" id="product-display">
    <div class="row">
        <?php for ($i = 1; $i <= min($records_per_page, $row_count); $i++) { ?>
            <div class="col-md-4 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="#">
                            <img class="pic-1" src="./assets/entertainment/<?= $entertainments[$i]['eventimage1'] ?>"
                                 alt="Preview Image 1">
                            <img class="pic-2" src="./assets/entertainment/<?= $entertainments[$i]['eventimage2'] ?>"
                                 alt="Preview Image 2">
                        </a>
                        <ul class="function">
                            <li><a href="" data-tip="Details"><i class="fas fa-search"></i></a></li>
                            <li><a href="" data-tip="Add to Shopping Cart"><i class="fas fa-shopping-cart"></i></a></li>
                        </ul>
                        <a href="#" class="select-options"><i class="fas fa-arrow-right"></i> Select Options</a>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#"><?= $entertainments[$i]['name'] ?></a></h3>
                        <div class="price">
                            <span>&#163;</span><?= $entertainments[$i]['price'] ?>
                            <span><?= (round((float)$entertainments[$i]['price'], 2)) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= ceil($row_count / $records_per_page); $i++) { ?>
                        <li class="page-item"><a class="page-link" href="events.php?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php } ?>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
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
</html>