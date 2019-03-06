<?php include("includes/config.php"); ?>
<!doctype html>
<html>
<head>
    <?php include("includes/headTags.php"); ?>
    <link rel="stylesheet" href="assets/css/util.css" type="text/css">
    <link rel="stylesheet" href="assets/css/passwordReset.css" type="text/css">
</head>
<body>
<?php include("includes/navigation.php"); ?>
<!--<div class="form-gap"></div>-->
<div class="container centered">
    <div class="row">
        <div class="col-md-4 col-md-offset-4"></div>
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2 class="text-center">Forgot Password?</h2>
                        <p>You can reset your password here.</p>
                        <div class="panel-body">
                            <?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

$token = md5(uniqid(rand(), TRUE));
                            $_SESSION['token'] = $token;
                            $_SESSION['token_time'] = time();
                            ?>
                            <form id="forgot-password" role="form" autocomplete="off" class="form" method="post"
                                  action="assets/controllers/passwordReset.php">
                                <input type="hidden" name="token" value="<?= $token ?>"/>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="email" name="email" placeholder="email address" class="form-control"
                                               type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="recover-submit" class="btn btn-lg btn-primary btn-block"
                                           value="Reset Password" type="submit">
                                </div>

                                <input type="hidden" class="hide" name="token" id="token" value="">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php include("includes/scripts.php"); ?>
<?php
if (isset($_GET['status']) and $_GET['status'] === 'requireVerification') { ?>
    <script> Swal.fire({
            title: 'Password Reset Link Sent',
            animation: false,
            customClass: 'animated tada',
            text: "Please check your email inbox",
            type: 'success'
        });
    </script>
<?php } ?>
</html>