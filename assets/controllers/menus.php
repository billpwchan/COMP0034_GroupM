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

if (!isset($_GET['criteria'])) {
    $menus = $event->read_menus($from_record_num, $records_per_page);
    $row_count_menus = $event->row_count_menus();
} elseif (isset($_GET['criteria'])) {
    $searchKey = $_GET['searchKey'];
    switch ($_GET['criteria']) {
        case 1:
            $menus = $event->read_menus_with_searched_name($from_record_num, $records_per_page, $searchKey);
            $row_count_menus = $event->row_count_menus_with_searched_name($searchKey);
            break;
    }
}