<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
$connect = db_connect();

// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 6; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page;

$menus = read($from_record_num, $records_per_page);
$row_count = row_count();


function read($from_record_num, $records_per_page)
{
    $sql = "
        SELECT event.event_ID, event.name, event.description, event.price, event.eventimage1, event.eventimage2, menu.duration
        from event, menu
        WHERE event.event_ID = menu.event_ID
        AND event.event_type = 'menu'
        ORDER BY event.created
        LIMIT {$from_record_num}, {$records_per_page}
    ";
    return db_select($sql);
}

function row_count()
{
    $sql = "
        SELECT COUNT(*) as rowCount
        from event, menu
        WHERE event.event_ID = menu.event_ID
        AND event.event_type = 'menu'
    ";
    return db_select($sql)[0]['rowCount'];
}