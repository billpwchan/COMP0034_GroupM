<link rel="stylesheet" href="../assets/css/navigation.css" type="text/css">

<nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top">
    <a class="navbar-brand" href="#">
        <i class="fas fa-glass-cheers"></i>
        UberKidz
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
            aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item <?php if ($CURRENT_PAGE == "Index") { ?>active<?php } ?>">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
            <li class="nav-item <?php if ($CURRENT_PAGE == "MyAccount") { ?>active<?php } ?>">
                <a class="nav-link" href="myAccount.php">
                    <i class="fas fa-user-circle"></i>
                    My Account
                </a>
            </li>
            <li class="nav-item <?php if ($CURRENT_PAGE == "Venues") { ?>active<?php } ?>">
                <a class="nav-link" href="venues.php">
                    <i class="fas fa-map"></i>
                    Venues
                </a>
            </li>
            <li class="nav-item <?php if ($CURRENT_PAGE == "EntertainmentPackages") { ?>active<?php } ?>">
                <a class="nav-link" href="events.php">
                    <i class="fas fa-map"></i>
                    Entertainment Packages
                </a>
            </li>
            <li class="nav-item <?php if ($CURRENT_PAGE == "Menus") { ?>active<?php } ?>">
                <a class="nav-link" href="menus.php">
                    <i class="fab fa-elementor"></i>
                    Menus
                </a>
            </li>
            <li class="nav-item <?php if ($CURRENT_PAGE == "ContactUs") { ?>active<?php } ?>">
                <a class="nav-link" href="contactUs.php">
                    <i class="fas fa-phone"></i>
                    Contact Us
                </a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="inputSearch">
            <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="search">Search</button>
        </form>
    </div>
</nav>
