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

<?php $selector = filter_input(INPUT_GET, 'selector');
$validator = filter_input(INPUT_GET, 'validator');

if (false !== ctype_xdigit($selector) && false !== ctype_xdigit($validator)) :
    ?>
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
                                $token = md5(uniqid(rand(), TRUE));
                                $_SESSION['token'] = $token;
                                $_SESSION['token_time'] = time();
                                ?>
                                <form id="forgot-password" role="form" autocomplete="off" class="form" method="post"
                                      action="assets/controllers/reset.php">
                                    <input type="hidden" name="token" value="<?= $token ?>"/>
                                    <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                                    <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="password" name="password" placeholder="New Password"
                                                   class="form-control"
                                                   type="password">
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
<?php endif; ?>
</body>
<?php include("includes/scripts.php"); ?>
</html>