<?php
/**
 * Created by PhpStorm.
 * User: Billp
 * Date: 22/2/2019
 * Time: 11:29
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
$connect = db_connect();

// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 6; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page;

$venues = read($from_record_num, $records_per_page);
$row_count = row_count();


function read($from_record_num, $records_per_page)
{
    $sql = "
        SELECT event.event_ID, event.name, event.description, event.price, event.eventimage1, event.eventimage2, address, capacity, region
        from event, venue
        WHERE event.event_ID = venue.event_ID
        AND event.event_type = 'venue'
        ORDER BY event.created
        LIMIT {$from_record_num}, {$records_per_page}
    ";
    return db_select($sql);
}

function row_count()
{
    $sql = "
        SELECT COUNT(*) as rowCount
        from event, venue
        WHERE event.event_ID = venue.event_ID
        AND event.event_type = 'venue'
    ";
    return db_select($sql)[0]['rowCount'];
}