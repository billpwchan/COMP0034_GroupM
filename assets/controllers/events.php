<?php
include("dbConnect.php");
$connect = db_connect();
if (!isset($_SESSION)) {
    session_start();
}

// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 6; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page;

$entertainments = read($from_record_num, $records_per_page);
$row_count = row_count();


function read($from_record_num, $records_per_page)
{
    $sql = "
        SELECT event.event_ID, event.name, event.description, event.price, event.eventimage1, event.eventimage2
        from event, entertainmentpackage
        WHERE event.event_ID = entertainmentpackage.event_ID
        AND event.event_type = 'entertainment'
        ORDER BY event.created
        LIMIT {$from_record_num}, {$records_per_page}
    ";
    return db_select($sql);
}

function row_count()
{
    $sql = "
        SELECT COUNT(*) as rowCount
        from event, entertainmentpackage
        WHERE event.event_ID = entertainmentpackage.event_ID
        AND event.event_type = 'entertainment'
    ";
    return db_select($sql)[0]['rowCount'];
}

?>