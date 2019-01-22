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
    default:
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "Welcome to UberKidz!";
}
?>

