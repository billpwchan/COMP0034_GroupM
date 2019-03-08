<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

header('Content-Type: application/json');
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/model/event.php';
$event = new event();
$methodID = $_GET['methodID'];

switch ($methodID) {
    case 1:
        $menuItems = $event->getMenuItems();
        echo json_encode($menuItems);
        break;
    case 2:
        $entertainers = $event->getEntertainers();
        echo json_encode($entertainers);
        break;
}
