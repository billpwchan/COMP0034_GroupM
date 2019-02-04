<?php include("includes/config.php"); ?>
<?php
if (!isset($_SESSION['userInfo'])) {
    header('index.php');
}
?>
<?php include("assets/controllers/myAccount.php") ?>
<!doctype html>
<html>
<head>
    <?php include("includes/headTags.php"); ?>
    <link rel="stylesheet" href="assets/css/myAccount.css" type="text/css">
    <link rel="stylesheet" href="assets/css/util.css" type="text/css">
</head>
<body>
<?php include("includes/navigation.php"); ?>
<div class="container">
    <header>
        <i class="fa fa-bars" aria-hidden="true"></i>
    </header>
    <main>
        <div class="row">
            <div class="left col-lg-4">
                <div class="photo-left">
                    <?php if (isset($_SESSION['userInfo']['avatar'])) { ?>
                        <img class="photo"
                             src="./assets/uploads/avatar/<?= $_SESSION['userInfo']['avatar'] ?>"/>
                    <?php } else { ?>
                        <img class="photo"
                             src="https://ui-avatars.com/api/?size=512&background=0D8ABC&color=fff&name=<?= $_SESSION['userInfo']['first_name'] ?>+<?= $_SESSION['userInfo']['last_name'] ?>"/>
                    <?php } ?>
                </div>
                <h4 class="name"><?= $_SESSION['userInfo']['first_name'] ?> <?= $_SESSION['userInfo']['last_name'] ?></h4>
                <p class="info">UI/UX Designer</p>
                <p class="info"><?= $_SESSION['userInfo']['email_address'] ?></p>
                <p class="desc"><?= isset($_SESSION['customer']['description']) ? $_SESSION['customer']['description'] : '' ?></p>
                <?php if (isset($_SESSION['customer'])) { ?>
                    <p class="desc balance"><i class="fas fa-hand-holding-usd"></i>Balance
                        : <?= $_SESSION['customer']['account_balance'] ?></p>
                <?php } ?>
                <div class="social">
                    <a class="social-links"
                       href="<?= isset($_SESSION['customer']) ? $_SESSION['customer']['facebook'] : 'https://www.facebook.com' ?>">
                        <i class="fab fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a class="social-links"
                       href="<?= isset($_SESSION['customer']) ? $_SESSION['customer']['twitter'] : 'https://www.twitter.com' ?>">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a class="social-links"
                       href="<?= isset($_SESSION['customer']) ? $_SESSION['customer']['pinterest'] : 'https://www.pinterest.com' ?>">
                        <i class="fab fa-pinterest" aria-hidden="true"></i>
                    </a>
                    <a class="social-links"
                       href="<?= isset($_SESSION['customer']) ? $_SESSION['customer']['tumblr'] : 'https://www.tumblr.com' ?>">
                        <i class="fab fa-tumblr" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="right col-lg-8">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" id="order-tab" data-toggle="tab" href="#order" role="tab"
                           aria-controls="order" aria-selected="true">Order History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="personal-tab" data-toggle="tab" href="#personal" role="tab"
                           aria-controls="personal" aria-selected="false">Personal Information</a>
                    </li>
                </ul>
                <span class="follow">Follow</span>
                <div class="tab-content profile-tab" id="myTabContent">
                    <div aria-labelledby="order-tab" class="row gallery tab-pane fade show active" id="order"
                         role="tabpanel">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <?php foreach (array_keys($orderHistory[0]) as $key) { ?>
                                    <th scope="col"><?= $key ?></th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php foreach (array_values($orderHistory) as $transaction) {
                                    foreach (array_values($transaction) as $value) { ?>
                                        <td scope="col"><?= ucfirst($value) ?></td>
                                    <?php }
                                } ?>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div aria-labelledby="personal-tab" class="row tab-pane fade" id="personal"
                         role="tabpane2">
                        <form>
                            <?php foreach ($_SESSION['userInfo'] as $key => $value) { ?>
                                <div class="form-group row">
                                    <label for="static<?= $key ?>" class="col-sm-2 col-form-label"><?= $key ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly
                                               class="<?= $key == 'email_address' ? 'form-control-plaintext' : 'form-control'; ?>"
                                               id="static<?= $key ?>"
                                               value="<?= $value ?>">
                                    </div>
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
    </main>
</div>
</body>
<?php include("includes/scripts.php"); ?>
</html>