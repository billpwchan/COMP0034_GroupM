<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/event.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/eventUtilFunc.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';

$event = new event();
$min = round($event->min_price('entertainment') - 1, 0, PHP_ROUND_HALF_UP);
$max = round($event->max_price('entertainment') + 1, 0, PHP_ROUND_HALF_DOWN);
$from = $min;
$to = $max;

if (!isset($_GET['criteria'])) {
    $entertainments = $event->read_entertainment($from_record_num, $records_per_page);
    $row_count_entertainment = $event->row_count_entertainment();
} elseif (isset($_GET['criteria'])) {
    switch ($_GET['criteria']) {
        case 1:
            $searchKey = $_GET['searchKey'];
            $entertainments = $event->read_entertainment_with_searched_name($from_record_num, $records_per_page, $searchKey);
            $row_count_entertainment = $event->row_count_entertainment_with_searched_name($searchKey);
            break;
        case 2:
            $from_price = $_GET['fromPrice'];
            $to_price = $_GET['toPrice'];
            $from = $from_price;
            $to = $to_price;
            $entertainments = $event->read_entertainment_with_price_range($from_record_num, $records_per_page, $from_price, $to_price);
            $row_count_entertainment = $event->row_count_entertainment_with_price_range($from_price, $to_price);
            break;
    }
}

?>