<?php
/**
 * Created by PhpStorm.
 * User: Billp
 * Date: 22/2/2019
 * Time: 11:29
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/eventUtilFunc.php';
$connect = db_connect();

if (!isset($_GET['criteria'])) {
    $venues = read_venues($from_record_num, $records_per_page);
    $row_count_venues = row_count_venue();
} elseif (isset($_GET['criteria'])) {
    $searchKey = mysqli_real_escape_string($connect, $_GET['searchKey']);
    switch ($_GET['criteria']) {
        case 1:
            $venues = read_with_searched_name($from_record_num, $records_per_page, $searchKey);
            $row_count_venues = row_count_venue_with_searched_name($searchKey);
            break;
    }
}
