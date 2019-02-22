<?php include("includes/config.php"); ?>
<!doctype html>
<html>
<head>
    <?php include("includes/headTags.php"); ?>
    <link rel="stylesheet" href="assets/css/contactUs.css" type="text/css">
    <link rel="stylesheet" href="assets/css/util.css" type="text/css">
</head>
<body>
<?php include("includes/navigation.php"); ?>

<div class="bg-contact">
    <div class="container-contact">
        <div class="wrap-contact">
            <div class="contact-pic js-tilt" data-tilt>
                <img src="./assets/img/logo.jpg" alt="IMG">
            </div>

            <?php
            $token = md5(uniqid(rand(), TRUE));
            $_SESSION['token'] = $token;
            $_SESSION['token_time'] = time();
            ?>
            <form class="contact-form validate-form" method="post" action="./assets/controllers/contactUs.php">
                <input type="hidden" name="token" value="<?= $token ?>"/>

                <span class="contact-form-title">Get in touch</span>

                <div class="wrap-userInput validate-input" data-validate="Name is required">
                    <input class="userInput" type="text" name="name" placeholder="Name">
                    <span class="focus-userInput"></span>
                    <span class="symbol-userInput">
							<i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                    <span class="alert-validate">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                </div>

                <div class="wrap-userInput validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="userInput" type="text" name="email" placeholder="Email">
                    <span class="focus-userInput"></span>
                    <span class="symbol-userInput">
							<i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                    <span class="alert-validate">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                </div>

                <div class="wrap-userInput validate-input" data-validate="Message is required">
                    <textarea class="userInput" type="text" name="message" placeholder="Message"></textarea>
                    <span class="focus-userInput"></span>
                    <span class="alert-validate">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                </div>

                <div class="container-contact-form-btn">
                    <button class="contact-form-btn">
                        Send
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
<?php include("includes/scripts.php"); ?>
<script src="./assets/js/contactUs.js"></script>
<?php
if (isset($_GET['status']) && $_GET['status'] === 'invalidEmail') { ?>
    <script> Swal.fire({
            title: 'Invalid Email',
            animation: false,
            customClass: 'animated tada',
            text: "Please provide a valid Email Address.",
            type: 'error'
        });
    </script>
<?php } elseif (isset($_GET['status']) && $_GET['status'] === 'success') { ?>
    <script> Swal.fire({
            title: 'Success',
            animation: false,
            customClass: 'animated tada',
            text: "Thanks for your Feedback! ",
            type: 'success'
        });
    </script>
<?php } ?>
</html>