<?php
switch ($_SERVER["SCRIPT_NAME"]) {
    case "/COMP0034_GroupM/index.php":
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "Welcome to UberKidz!";
        break;
    case "/COMP0034_GroupM/registration.php":
    case "/COMP0034_GroupM/login.php":
    case "/COMP0034_GroupM/myAccount.php":
        $CURRENT_PAGE = "MyAccount";
        $PAGE_TITLE = "My Account";
        break;
    case "/COMP0034_GroupM/venues.php":
        $CURRENT_PAGE = "Venues";
        $PAGE_TITLE = "Venues";
        break;
    case "/COMP0034_GroupM/events.php":
        $CURRENT_PAGE = "EntertainmentPackages";
        $PAGE_TITLE = "Entertainment Packages";
        break;
    case "/COMP0034_GroupM/menus.php":
        $CURRENT_PAGE = "Menus";
        $PAGE_TITLE = "Menus";
        break;
    case "/COMP0034_GroupM/contactUs.php":
        $CURRENT_PAGE = "ContactUs";
        $PAGE_TITLE = "Contact Us";
        break;
    case "/COMP0034_GroupM/FAQ.php":
        $CURRENT_PAGE = "FAQ";
        $PAGE_TITLE = "FAQ Page";
        break;
    default:
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "Welcome to UberKidz!";
}
?>

