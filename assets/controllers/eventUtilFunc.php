<?php

// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 6; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page;


function read_entertainment($from_record_num, $records_per_page)
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

function read_entertainment_with_searched_name($from_record_num, $records_per_page, $searchKey)
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

function row_count_entertainment()
{
    $sql = "
        SELECT COUNT(*) as rowCount
        from event, entertainmentpackage
        WHERE event.event_ID = entertainmentpackage.event_ID
        AND event.event_type = 'entertainment'
    ";
    return db_select($sql)[0]['rowCount'];
}

function row_count_entertainment_with_searched_name($searchKey)
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

function read_menus($from_record_num, $records_per_page)
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

function read_menus_with_searched_name($from_record_num, $records_per_page, $searchKey)
{
    $sql = "
        SELECT event.event_ID, event.name, event.description, event.price, event.eventimage1, event.eventimage2
        from event, menu
        WHERE event.event_ID = menu.event_ID
        AND event.event_type = 'menu'
        AND event.name LIKE '%$searchKey%'
        ORDER BY event.created
        LIMIT {$from_record_num}, {$records_per_page}
    ";
    return db_select($sql);
}

function row_count_menus()
{
    $sql = "
        SELECT COUNT(*) as rowCount
        from event, menu
        WHERE event.event_ID = menu.event_ID
        AND event.event_type = 'menu'
    ";
    return db_select($sql)[0]['rowCount'];
}

function row_count_menus_with_searched_name($searchKey)
{
    $sql = "
        SELECT COUNT(*) as rowCount
        from event, menu
        WHERE event.event_ID = menu.event_ID
        AND event.event_type = 'menu'
        AND event.name LIKE '%$searchKey%'
    ";
    return db_select($sql)[0]['rowCount'];
}

function read_venues($from_record_num, $records_per_page)
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

function read_with_searched_name($from_record_num, $records_per_page, $searchKey)
{
    $sql = "
        SELECT event.event_ID, event.name, event.description, event.price, event.eventimage1, event.eventimage2
        from event, venue
        WHERE event.event_ID = venue.event_ID
        AND event.event_type = 'venue'
        AND event.name LIKE '%$searchKey%'
        ORDER BY event.created
        LIMIT {$from_record_num}, {$records_per_page}
    ";
    return db_select($sql);
}

function row_count_venue()
{
    $sql = "
        SELECT COUNT(*) as rowCount
        from event, venue
        WHERE event.event_ID = venue.event_ID
        AND event.event_type = 'venue'
    ";
    return db_select($sql)[0]['rowCount'];
}

function row_count_venue_with_searched_name($searchKey)
{
    $sql = "
        SELECT COUNT(*) as rowCount
        from event, venue
        WHERE event.event_ID = venue.event_ID
        AND event.event_type = 'venue'
        AND event.name LIKE '%$searchKey%'
    ";
    return db_select($sql)[0]['rowCount'];
}