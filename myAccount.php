<?php include("includes/config.php"); ?>
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
                    <?php if (isset($_SESSION['userInfo']['avatar']) and $_SESSION['userInfo']['avatar'] !== '') { ?>
                        <img class="photo"
                             src="./assets/uploads/avatar/<?= $_SESSION['userInfo']['avatar'] ?>"/>
                    <?php } else { ?>
                        <img class="photo"
                             src="https://ui-avatars.com/api/?size=512&background=0D8ABC&color=fff&name=<?= $_SESSION['userInfo']['first_name'] ?>+<?= $_SESSION['userInfo']['last_name'] ?>"/>
                    <?php } ?>
                </div>
                <h4 class="name"><?= $_SESSION['userInfo']['first_name'] ?> <?= $_SESSION['userInfo']['last_name'] ?></h4>
                <p class="info"><?= (isset($_SESSION['customer']) and (float)$_SESSION['customer']['account_balance'] > 1000) ? 'Premium' : '' ?> <?= isset($_SESSION['customer']) ? 'Customer' : 'Service Provider' ?></p>
                <p class="info"><?= $_SESSION['userInfo']['email_address'] ?></p>
                <p class="desc"><?= isset($_SESSION['customer']['description']) ? $_SESSION['customer']['description'] : '' ?></p>
                <?php if (isset($_SESSION['customer'])) { ?>
                    <p class="desc balance"><i class="fas fa-hand-holding-usd"></i> Balance
                        : £<?= $_SESSION['customer']['account_balance'] ?></p>
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
                <?php } else if (isset($_SESSION['service_provider'])) { ?>
                    <p class="desc balance"><i class="fas fa-building"></i>Company
                        Name: <?= $_SESSION['service_provider']['company_name'] ?></p>
                <?php } ?>
            </div>
            <div class="right col-lg-8">
                <ul class="nav">
                    <li class="nav-item" id="order_tab">
                        <a class="nav-link active" id="order-tab" data-toggle="tab" href="#order" role="tab"
                           aria-controls="order"
                           aria-selected="true"><?= isset($_SESSION['customer']) ? 'Order History' : 'Provided Service' ?>
                        </a>
                    </li>
                    <li class="nav-item" id="personal_tab">
                        <a class="nav-link" id="personal-tab" data-toggle="tab" href="#personal" role="tab"
                           aria-controls="personal" aria-selected="false">Personal Information</a>
                    </li>
                    <li class="nav-item" id="add_service">
                        <a class="nav-link" id="add_service" data-toggle="tab" href="#service" role="tab"
                           aria-controls="service" aria-selected="false">Add Service</a>
                    </li>
                </ul>
                <div class="tab-content profile-tab" id="myTabContent">
                    <div aria-labelledby="order-tab" class="row gallery tab-pane fade show active" id="order"
                         role="tabpanel">
                        <?php if (isset($_SESSION['customer'])) { ?>
                            <?php if (isset($orderHistory) && sizeof($orderHistory) > 0) { ?>
                                <table class="table table-hover center">
                                    <thead>
                                    <tr>
                                        <?php foreach (array_keys($orderHistory[0]) as $key) { ?>
                                            <th scope="col"><?= $key ?></th>
                                        <?php } ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach (array_values($orderHistory) as $transaction) { ?>
                                        <tr>
                                            <?php foreach (array_values($transaction) as $value) { ?>
                                                <td scope="col"><?= ucfirst($value) ?></td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            <?php } else { ?> <h1 class="display-1">No Order History Found...</h1> <?php } ?>
                        <?php } else {
                            if (isset($providedServices) && sizeof($providedServices) > 0) { ?>
                                <table class="table table-hover center">
                                    <thead>
                                    <tr>
                                        <?php foreach (array_keys($providedServices[0]) as $key) { ?>
                                            <th scope="col"><?= $key ?></th>
                                        <?php } ?>
                                        <th scope="col">Operations</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach (array_values($providedServices) as $providedService) { ?>
                                        <tr>
                                            <?php foreach (array_values($providedService) as $value) { ?>
                                                <td scope="col"><?= ucfirst($value) ?></td>
                                            <?php } ?>
                                            <td scope="col"><i class="fas fa-times"></i></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            <?php } else { ?> <h1 class="display-1">No Provided Service Found...</h1> <?php } ?>
                        <?php } ?>
                    </div>
                    <div aria-labelledby="personal-tab" class="row tab-pane fade" id="personal"
                         role="tabpane2">
                        <div class="form-group row">
                            <label for="staticemail_address" class="col-sm-3 col-form-label">Email address</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="staticemail_address"
                                       value="<?= $_SESSION['userInfo']['email_address'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticgender" class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="staticgender"
                                       value="<?= $_SESSION['userInfo']['gender'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticregistration_date" class="col-sm-3 col-form-label">Registration
                                date</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="staticregistration_date"
                                       value="<?= $_SESSION['userInfo']['registration_date'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticfirst_name" class="col-sm-3 col-form-label">First name</label>
                            <div class="col-sm-5">
                                <input type="text" readonly class="form-control" id="staticfirst_name"
                                       value="<?= $_SESSION['userInfo']['first_name'] ?>">
                            </div>
                            <button class=" col-sm-1 btn edit-btn" id="edit_button_first_name"
                                    style="visibility: visible">Edit
                            </button>
                            <button class=" col-sm-1 btn save-btn" id="save_button_first_name"
                                    style="visibility: hidden">Save
                            </button>
                            <button class=" col-sm-1 btn cancel-btn" id="cancel_button_first_name"
                                    style="visibility: hidden">Cancel
                            </button>
                        </div>
                        <div class="form-group row">
                            <label for="staticlast_name" class="col-sm-3 col-form-label">Last name</label>
                            <div class="col-sm-5">
                                <input type="text" readonly class="form-control" id="staticlast_name"
                                       value="<?= $_SESSION['userInfo']['last_name'] ?>">
                            </div>
                            <button class=" col-sm-1 btn edit-btn" id="edit_button_last_name"
                                    style="visibility: visible">Edit
                            </button>
                            <button class=" col-sm-1 btn save-btn" id="save_button_last_name"
                                    style="visibility: hidden">Save
                            </button>
                            <button class=" col-sm-1 btn cancel-btn" id="cancel_button_last_name"
                                    style="visibility: hidden">Cancel
                            </button>
                        </div>
                        <div class="form-group row">
                            <label for="staticcontact_number" class="col-sm-3 col-form-label">Contact number</label>
                            <div class="col-sm-5">
                                <input type="text" readonly class="form-control" id="staticcontact_number"
                                       value="<?= $_SESSION['userInfo']['contact_number'] ?>">
                            </div>
                            <button class=" col-sm-1 btn edit-btn" id="edit_button_contact_number"
                                    style="visibility: visible">Edit
                            </button>
                            <button class=" col-sm-1 btn save-btn" id="save_button_contact_number"
                                    style="visibility: hidden">Save
                            </button>
                            <button class=" col-sm-1 btn cancel-btn" id="cancel_button_contact_number"
                                    style="visibility: hidden">Cancel
                            </button>
                        </div>
                        </form>
                    </div>
                    <div aria-labelledby="add_service" class="row tab-pane fade" id="service"
                         role="tabpane2">
                        <div class="form-group row">
                            <label for="staticemail_address" class="col-sm-3 col-form-label">Please Work</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="staticemail_address"
                                       value="<?= $_SESSION['userInfo']['email_address'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticgender" class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="staticgender"
                                       value="<?= $_SESSION['userInfo']['gender'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticregistration_date" class="col-sm-3 col-form-label">Registration
                                date</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="staticregistration_date"
                                       value="<?= $_SESSION['userInfo']['registration_date'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticfirst_name" class="col-sm-3 col-form-label">First name</label>
                            <div class="col-sm-5">
                                <input type="text" readonly class="form-control" id="staticfirst_name"
                                       value="<?= $_SESSION['userInfo']['first_name'] ?>">
                            </div>
                            <button class=" col-sm-1 btn edit-btn" id="edit_button_first_name"
                                    style="visibility: visible">Edit
                            </button>
                            <button class=" col-sm-1 btn save-btn" id="save_button_first_name"
                                    style="visibility: hidden">Save
                            </button>
                            <button class=" col-sm-1 btn cancel-btn" id="cancel_button_first_name"
                                    style="visibility: hidden">Cancel
                            </button>
                        </div>
                        <div class="form-group row">
                            <label for="staticlast_name" class="col-sm-3 col-form-label">Last name</label>
                            <div class="col-sm-5">
                                <input type="text" readonly class="form-control" id="staticlast_name"
                                       value="<?= $_SESSION['userInfo']['last_name'] ?>">
                            </div>
                            <button class=" col-sm-1 btn edit-btn" id="edit_button_last_name"
                                    style="visibility: visible">Edit
                            </button>
                            <button class=" col-sm-1 btn save-btn" id="save_button_last_name"
                                    style="visibility: hidden">Save
                            </button>
                            <button class=" col-sm-1 btn cancel-btn" id="cancel_button_last_name"
                                    style="visibility: hidden">Cancel
                            </button>
                        </div>
                        <div class="form-group row">
                            <label for="staticcontact_number" class="col-sm-3 col-form-label">Contact number</label>
                            <div class="col-sm-5">
                                <input type="text" readonly class="form-control" id="staticcontact_number"
                                       value="<?= $_SESSION['userInfo']['contact_number'] ?>">
                            </div>
                            <button class=" col-sm-1 btn edit-btn" id="edit_button_contact_number"
                                    style="visibility: visible">Edit
                            </button>
                            <button class=" col-sm-1 btn save-btn" id="save_button_contact_number"
                                    style="visibility: hidden">Save
                            </button>
                            <button class=" col-sm-1 btn cancel-btn" id="cancel_button_contact_number"
                                    style="visibility: hidden">Cancel
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </main>
</div>
</body>
<?php include("includes/scripts.php"); ?>
<script src="assets/js/accountValidationUtil.js"></script>
<script src="assets/js/myAccount.js"></script>
</html>