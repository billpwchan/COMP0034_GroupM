<?php include("includes/config.php"); ?>
<!doctype html>
<html>
<head>
    <?php include("includes/headTags.php"); ?>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/FAQ.css" type="text/css">
    <link rel="stylesheet" href="assets/css/util.css" type="text/css">
    <link rel="stylesheet" href="assets/css/animate.css" type="text/css">
</head>
<body>
<?php include("includes/navigation.php"); ?>
<main role="main">
    <div class="BG-FAQ">
    <div class="banner-area">
        <div class="container">
            <div class="center">
            <h1 class="display-3 text-white">How can I help you?</h1>
            <form class="mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Type keywords to find answer" aria-label="Search">
                <button class="btn btn-primary mt-2" type="submit">Search</button>
            </form>
                <br>
            <p class="text-white">You can also browser the topics below to find what you are looking for</p>
            </div>
        </div>
    </div>



    <div class="container">
        <h2>Frequently asked questions</h2>
        <br>
        <div class="row">
            <div class="col-md-4">
                <h2>General</h2>
                <div class="faq_container">
                    <div class="faq">
                        <div class="faq_question">What is Uberkidz</div>
                        <div class="faq_answer_container">
                            <div class="faq_answer">Answer goes here</div>
                        </div>
                    </div>
                </div>
                <div class="faq_container">
                    <div class="faq">
                        <div class="faq_question">Getting started</div>
                        <div class="faq_answer_container">
                            <div class="faq_answer">Answer goes here</div>
                        </div>
                    </div>
                </div>
                <div class="faq_container">
                    <div class="faq">
                        <div class="faq_question">Account setting</div>
                        <div class="faq_answer_container">
                            <div class="faq_answer">Answer goes here</div>
                        </div>
                    </div>
                </div>
                <p><a class="btn btn-secondary" href="#" role="button">View all questions &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Placing an order</h2>
                <div class="faq_container">
                    <div class="faq">
                        <div class="faq_question">How to place an order</div>
                        <div class="faq_answer_container">
                            <div class="faq_answer">Answer goes here</div>
                        </div>
                    </div>
                </div>
                <div class="faq_container">
                    <div class="faq">
                        <div class="faq_question">What is an entertainment package</div>
                        <div class="faq_answer_container">
                            <div class="faq_answer">Answer goes here</div>
                        </div>
                    </div>
                </div>
                <div class="faq_container">
                    <div class="faq">
                        <div class="faq_question">Payment options</div>
                        <div class="faq_answer_container">
                            <div class="faq_answer">Answer goes here</div>
                        </div>
                    </div>
                </div>
                <p><a class="btn btn-secondary" href="#" role="button">View all questions &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>After sale service</h2>
                <div class="faq_container">
                    <div class="faq">
                        <div class="faq_question">How to edit ot cancel an order</div>
                        <div class="faq_answer_container">
                            <div class="faq_answer">Answer goes here</div>
                        </div>
                    </div>
                </div>
                <div class="faq_container">
                    <div class="faq">
                        <div class="faq_question">Refunds</div>
                        <div class="faq_answer_container">
                            <div class="faq_answer">Answer goes here</div>
                        </div>
                    </div>
                </div>
                <div class="faq_container">
                    <div class="faq">
                        <div class="faq_question">How to contact us</div>
                        <div class="faq_answer_container">
                            <div class="faq_answer">Answer goes here</div>
                        </div>
                    </div>
                </div>
                <p><a class="btn btn-secondary" href="#" role="button">View all questions &raquo;</a></p>
            </div>
        </div>

        <hr>

    </div> <!-- /container -->
    </div>
</main>


</body>
<?php include("includes/scripts.php"); ?>
<script src="assets/js/FAQ.js"></script>
</html>
