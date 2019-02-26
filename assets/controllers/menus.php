<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/eventUtilFunc.php';
$connect = db_connect();

if (!isset($_GET['criteria'])) {
    $menus = read_menus($from_record_num, $records_per_page);
    $row_count_menus = row_count_menus();
} elseif (isset($_GET['criteria'])) {
    $searchKey = mysqli_real_escape_string($connect, $_GET['searchKey']);
    switch ($_GET['criteria']) {
        case 1:
            $menus = read_menus_with_searched_name($from_record_num, $records_per_page, $searchKey);
            $row_count_menus = row_count_menus_with_searched_name($searchKey);
            break;
    }
}