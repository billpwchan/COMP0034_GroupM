<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/dbConnect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/controllers/tokenValidation.php';
$connect = db_connect();

// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 6; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page;

if (!isset($_GET['criteria'])) {
    $entertainments = read($from_record_num, $records_per_page);
    $row_count = row_count();
} elseif (isset($_GET['criteria'])) {
    $searchKey = mysqli_real_escape_string($connect, $_GET['searchKey']);
    switch ($_GET['criteria']) {
        case 1:
            $entertainments = read_with_searched_name($from_record_num, $records_per_page, $searchKey);
            $row_count = row_count_with_searched_name($searchKey);
            break;
    }
}

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

function read_with_searched_name($from_record_num, $records_per_page, $searchKey)
{
    $sql = "
        SELECT event.event_ID, event.name, event.description, event.price, event.eventimage1, event.eventimage2
        from event, entertainmentpackage
        WHERE event.event_ID = entertainmentpackage.event_ID
        AND event.event_type = 'entertainment'
        AND event.name LIKE '%$searchKey%'
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

function row_count_with_searched_name($searchKey)
{
    $sql = "
        SELECT COUNT(*) as rowCount
        from event, entertainmentpackage
        WHERE event.event_ID = entertainmentpackage.event_ID
        AND event.event_type = 'entertainment'
        AND event.name LIKE '%$searchKey%'
    ";
    return db_select($sql)[0]['rowCount'];
}

?>