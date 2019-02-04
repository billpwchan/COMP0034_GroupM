<?php
include("dbConnect.php");
$connect = db_connect();
session_start();
// to prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";

// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 6; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query LIMIT clause

$entertainments = read($from_record_num, $records_per_page);
$row_count = row_count();


function read($from_record_num, $records_per_page)
{
    $sql = "
        SELECT event.event_ID, event.name, event.description, event.description
        from event, entertainmentpackage
        WHERE event.event_ID = entertainmentpackage.event_ID
        AND event.event_type = 'entertainmentpackage'
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
        AND event.event_type = 'entertainmentpackage'
    ";
    return db_select($sql)[0]['rowCount'];
}

?>