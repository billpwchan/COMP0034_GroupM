<?php include("includes/config.php"); ?>
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
                    <img class="photo"
                         src="https://image.noelshack.com/fichiers/2017/38/2/1505775062-1505606859-portrait-1961529-960-720.jpg"/>
                    <div class="profileActive"></div>
                </div>
                <h4 class="name"><?= $_SESSION['userInfo']['first_name'] ?> <?= $_SESSION['userInfo']['last_name'] ?></h4>
                <p class="info">UI/UX Designer</p>
                <p class="info"><?= $_SESSION['email'] ?></p>
                <p class="desc">Hi ! My name is Jane Doe. I'm a UI/UX Designer from Paris, in France. I really enjoy
                    photography and mountains.</p>
                <div class="social">
                    <i class="fab fa-facebook" aria-hidden="true"></i>
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                    <i class="fab fa-pinterest" aria-hidden="true"></i>
                    <i class="fab fa-tumblr" aria-hidden="true"></i>
                </div>
            </div>
            <div class="right col-lg-8">
                <ul class="nav">
                    <li>Gallery</li>
                    <li>Collections</li>
                    <li>Groups</li>
                    <li>About</li>
                </ul>
                <span class="follow">Follow</span>
                <div class="row gallery">
                    <div class="col-md-4">
                        <img src="https://image.noelshack.com/fichiers/2017/38/2/1505774813-photo4.jpg"/>
                    </div>
                    <div class="col-md-4">
                        <img src="https://image.noelshack.com/fichiers/2017/38/2/1505774814-photo5.jpg"/>
                    </div>
                    <div class="col-md-4">
                        <img src="https://image.noelshack.com/fichiers/2017/38/2/1505774814-photo6.jpg"/>
                    </div>
                    <div class="col-md-4">
                        <img src="https://image.noelshack.com/fichiers/2017/38/2/1505774817-photo1.jpg"/>
                    </div>
                    <div class="col-md-4">
                        <img src="https://image.noelshack.com/fichiers/2017/38/2/1505774815-photo2.jpg"/>
                    </div>
                    <div class="col-md-4">
                        <img src="https://image.noelshack.com/fichiers/2017/38/2/1505774816-photo3.jpg"/>
                    </div>
                </div>
            </div>
    </main>
</div>
</body>
<?php include("includes/scripts.php"); ?>
</html>