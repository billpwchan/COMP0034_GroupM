<?php
switch ($_SERVER["SCRIPT_NAME"]) {
    case "/COMP0034_GroupM/index.php":
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "Welcome to UberKidz!";
        break;
    case "/COMP0034_GroupM/events.php":
    case "/COMP0034_GroupM/eventDetail.php":
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
    default:
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "Welcome to UberKidz!";
}
?>

