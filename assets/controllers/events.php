<?php
include("./dbConnect.php");
$connect = db_connect();
session_start();


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

function count()
{
    $sql = "
        SELECT COUNT(*)
        from event, entertainmentpackage
        WHERE event.event_ID = entertainmentpackage.event_ID
        AND event.event_type = 'entertainmentpackage'
    ";
    return db_select($sql);
}

?>