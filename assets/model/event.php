<?php
/**
 * Copyright (C) UberKidz - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by UberKidz <uberkidz@gmail.com>, 2019
 *
 */

/**
 * Created by PhpStorm.
 * User: Billp
 * Date: 1/3/2019
 * Time: 15:43
 */

require_once "dbController.php";

/**
 * Class event
 */
class event
{

    /**
     * @param $productType
     * @param $productID
     * @return mixed
     */
    function selectDuration($productType, $productID)
    {
        $db_handle = new dbController();
        switch ($productType) {
            case 'entertainment':
                $sql = "SELECT duration FROM entertainmentpackage WHERE event_ID = ?";
                break;
            case 'menu':
                $sql = "SELECT duration FROM menu WHERE event_ID = ?";
                break;
        }
        return $db_handle->db_query($sql, 'i', array($productID))[0]['duration'];
    }

    /**
     * @param $productID
     * @param $startTime
     * @param $endTime
     * @return array
     */
    function checkOverlapBookingOrderDetail($productID, $startTime, $endTime)
    {
        $db_handle = new dbController();
        $sql = "SELECT orderdetail_ID
                FROM orderdetail
                WHERE event_ID = ?
                AND event_startTime BETWEEN ? AND ?
            ";
        return $db_handle->db_query($sql, 'iss', array($productID, $startTime, $endTime));
    }


    /**
     * @param $productID
     * @return mixed
     */
    function getEventPrice($productID)
    {
        $db_handle = new dbController();
        $sql = "SELECT price FROM event WHERE event_ID = ?";
        return $db_handle->db_query($sql, 'i', array($productID))[0]['price'];
    }

    /**
     * @param $productID
     * @return mixed
     */
    function getEventType($productID)
    {
        $db_handle = new dbController();
        $sql = "SELECT event.event_type
        FROM event
        WHERE event_ID = ?
        ";
        return $db_handle->db_query($sql, 'i', array($productID))[0]['event_type'];
    }

    /**
     * @param $from_record_num
     * @param $records_per_page
     * @return array
     */
    function read_entertainment($from_record_num, $records_per_page)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT event.event_ID, event.name, event.description, event.price, event.eventimage1, event.eventimage2
        from event, entertainmentpackage
        WHERE event.event_ID = entertainmentpackage.event_ID
        AND event.event_type = 'entertainment'
        ORDER BY event.created
        LIMIT ?, ?
        ";
        return $db_handle->db_query($sql, 'ii', array($from_record_num, $records_per_page));
    }

    /**
     * @param $from_record_num
     * @param $records_per_page
     * @param $searchKey
     * @return array
     */
    function read_entertainment_with_searched_name($from_record_num, $records_per_page, $searchKey)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT event.event_ID, event.name, event.description, event.price, event.eventimage1, event.eventimage2
        from event, entertainmentpackage
        WHERE event.event_ID = entertainmentpackage.event_ID
        AND event.event_type = 'entertainment'
        AND event.name LIKE ?
        ORDER BY event.created
        LIMIT ?, ?
      ";
        return $db_handle->db_query($sql, 'sii', array('%' . $searchKey . '%', $from_record_num, $records_per_page));
    }

    /**
     * @param $from_record_num
     * @param $records_per_page
     * @param $from_price
     * @param $to_price
     * @return array
     */
    function read_entertainment_with_price_range($from_record_num, $records_per_page, $from_price, $to_price)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT event.event_ID, event.name, event.description, event.price, event.eventimage1, event.eventimage2
        from event, entertainmentpackage
        WHERE event.event_ID = entertainmentpackage.event_ID
        AND event.event_type = 'entertainment'
        AND event.price BETWEEN ? AND ?
        ORDER BY event.created
        LIMIT ?, ?
      ";
        return $db_handle->db_query($sql, 'ddii', array(floatval($from_price), floatval($to_price), $from_record_num, $records_per_page));
    }

    /**
     * @return mixed
     */
    function row_count_entertainment()
    {
        $db_handle = new dbController();
        $sql = "
        SELECT COUNT(*) as rowCount
        from event, entertainmentpackage
        WHERE event.event_ID = entertainmentpackage.event_ID
        AND event.event_type = ?
    ";
        return $db_handle->db_query($sql, 's', array('entertainment'))[0]['rowCount'];
    }

    /**
     * @param $searchKey
     * @return mixed
     */
    function row_count_entertainment_with_searched_name($searchKey)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT COUNT(*) as rowCount
        from event, entertainmentpackage
        WHERE event.event_ID = entertainmentpackage.event_ID
        AND event.event_type = 'entertainment'
        AND event.name LIKE ?
    ";
        return $db_handle->db_query($sql, 's', array('%' . $searchKey . '%'))[0]['rowCount'];
    }

    /**
     * @param $from_price
     * @param $to_price
     * @return mixed
     */
    function row_count_entertainment_with_price_range($from_price, $to_price)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT COUNT(*) as rowCount
        from event, entertainmentpackage
        WHERE event.event_ID = entertainmentpackage.event_ID
        AND event.event_type = 'entertainment'
        AND event.price BETWEEN ? AND ?
    ";
        return $db_handle->db_query($sql, 'dd', array(floatval($from_price), floatval($to_price)))[0]['rowCount'];
    }

    /**
     * @param $from_record_num
     * @param $records_per_page
     * @return array
     */
    function read_menus($from_record_num, $records_per_page)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT event.event_ID, event.name, event.description, event.price, event.eventimage1, event.eventimage2, menu.duration
        from event, menu
        WHERE event.event_ID = menu.event_ID
        AND event.event_type = 'menu'
        ORDER BY event.created
        LIMIT ?, ?
        ";
        return $db_handle->db_query($sql, 'ii', array($from_record_num, $records_per_page));
    }

    /**
     * @param $from_record_num
     * @param $records_per_page
     * @param $searchKey
     * @return array
     */
    function read_menus_with_searched_name($from_record_num, $records_per_page, $searchKey)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT event.event_ID, event.name, event.description, event.price, event.eventimage1, event.eventimage2
        from event, menu
        WHERE event.event_ID = menu.event_ID
        AND event.event_type = 'menu'
        AND event.name LIKE ?
        ORDER BY event.created
        LIMIT ?, ?
      ";
        return $db_handle->db_query($sql, 'sii', array('%' . $searchKey . '%', $from_record_num, $records_per_page));
    }

    function read_menus_with_price_range($from_record_num, $records_per_page, $from_price, $to_price)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT event.event_ID, event.name, event.description, event.price, event.eventimage1, event.eventimage2
        from event, menu
        WHERE event.event_ID = menu.event_ID
        AND event.event_type = 'menu'
        AND event.price BETWEEN ? AND ?
        ORDER BY event.created
        LIMIT ?, ?
      ";
        return $db_handle->db_query($sql, 'ddii', array(floatval($from_price), floatval($to_price), $from_record_num, $records_per_page));
    }

    /**
     * @return mixed
     */
    function row_count_menus()
    {
        $db_handle = new dbController();
        $sql = "
        SELECT COUNT(*) as rowCount
        from event, menu
        WHERE event.event_ID = menu.event_ID
        AND event.event_type = ?
    ";
        return $db_handle->db_query($sql, 's', array('menu'))[0]['rowCount'];
    }

    /**
     * @param $searchKey
     * @return mixed
     */
    function row_count_menus_with_searched_name($searchKey)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT COUNT(*) as rowCount
        from event, menu
        WHERE event.event_ID = menu.event_ID
        AND event.event_type = 'menu'
        AND event.name LIKE ?
    ";
        return $db_handle->db_query($sql, 's', array('%' . $searchKey . '%'))[0]['rowCount'];
    }

    function row_count_menus_with_price_range($from_price, $to_price)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT COUNT(*) as rowCount
        from event, menu
        WHERE event.event_ID = menu.event_ID
        AND event.event_type = 'menu'
        AND event.price BETWEEN ? AND ?
    ";
        return $db_handle->db_query($sql, 'dd', array(floatval($from_price), floatval($to_price)))[0]['rowCount'];
    }

    /**
     * @param $from_record_num
     * @param $records_per_page
     * @return array
     */
    function read_venues($from_record_num, $records_per_page)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT event.event_ID, event.name, event.description, event.price, event.eventimage1, event.eventimage2, address_line1, address_line2, post_code, capacity, region
        from event, venue
        WHERE event.event_ID = venue.event_ID
        AND event.event_type = 'venue'
        ORDER BY event.created
        LIMIT ?, ?
      ";
        return $db_handle->db_query($sql, 'ii', array($from_record_num, $records_per_page));
    }

    /**
     * @param $from_record_num
     * @param $records_per_page
     * @param $searchKey
     * @return array
     */
    function read_venue_with_searched_name($from_record_num, $records_per_page, $searchKey)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT event.event_ID, event.name, event.description, event.price, event.eventimage1, event.eventimage2
        from event, venue
        WHERE event.event_ID = venue.event_ID
        AND event.event_type = 'venue'
        AND event.name LIKE ?
        ORDER BY event.created
        LIMIT ?, ?
    ";
        return $db_handle->db_query($sql, 'sii', array('%' . $searchKey . '%', $from_record_num, $records_per_page));
    }

    function read_venue_with_price_range($from_record_num, $records_per_page, $from_price, $to_price)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT event.event_ID, event.name, event.description, event.price, event.eventimage1, event.eventimage2
        from event, venue
        WHERE event.event_ID = venue.event_ID
        AND event.event_type = 'venue'
        AND event.price BETWEEN ? AND ?
        ORDER BY event.created
        LIMIT ?, ?
      ";
        return $db_handle->db_query($sql, 'ddii', array(floatval($from_price), floatval($to_price), $from_record_num, $records_per_page));
    }

    /**
     * @return mixed
     */
    function row_count_venue()
    {
        $db_handle = new dbController();
        $sql = "
        SELECT COUNT(*) as rowCount
        from event, venue
        WHERE event.event_ID = venue.event_ID
        AND event.event_type = ?
    ";
        return $db_handle->db_query($sql, 's', array('venue'))[0]['rowCount'];
    }

    /**
     * @param $searchKey
     * @return mixed
     */
    function row_count_venue_with_searched_name($searchKey)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT COUNT(*) as rowCount
        from event, venue
        WHERE event.event_ID = venue.event_ID
        AND event.event_type = 'venue'
        AND event.name LIKE ?
        ";
        return $db_handle->db_query($sql, 's', array('%' . $searchKey . '%'))[0]['rowCount'];
    }

    function row_count_venue_with_price_range($from_price, $to_price)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT COUNT(*) as rowCount
        from event, venue
        WHERE event.event_ID = venue.event_ID
        AND event.event_type = 'venue'
        AND event.price BETWEEN ? AND ?
    ";
        return $db_handle->db_query($sql, 'dd', array(floatval($from_price), floatval($to_price)))[0]['rowCount'];
    }


    /**
     * @param $productID
     * @param $productType
     * @return array
     */
    public function read_event_detail($productID, $productType)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT event.event_ID, event.provider_ID, event.event_type, event.name, event.price, event.description, event.created, event.eventimage1, event.eventimage2, event.eventimage3, entertainmentpackage.duration
        FROM event, entertainmentpackage
        WHERE event.event_ID = entertainmentpackage.event_ID
        AND event.event_ID = ?
        AND event.event_type = ?
        ";
        return $db_handle->db_query($sql, 'is', array($productID, $productType));

    }

    /**
     * @param $productID
     * @param $productType
     * @return array
     */
    public function read_menu_detail($productID, $productType)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT event.event_ID, event.provider_ID, event.event_type, event.name, event.price, event.description, event.created, event.eventimage1, event.eventimage2, event.eventimage3, menu.duration
        FROM event, menu
        WHERE event.event_ID = menu.event_ID
        AND event.event_ID = ?
        AND event.event_type = ?
        ";
        return $db_handle->db_query($sql, 'is', array($productID, $productType));

    }

    /**
     * @param $productID
     * @param $productType
     * @return array
     */
    public function read_venue_detail($productID, $productType)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT event.event_ID, event.provider_ID, event.event_type, event.name, event.price, event.description, event.created, event.eventimage1, event.eventimage2, event.eventimage3, venue.address_line1, venue.address_line2, venue.post_code, venue.capacity, venue.region
        FROM event, venue
        WHERE event.event_ID = venue.event_ID
        AND event.event_ID = ?
        AND event.event_type = ?
        ";
        return $db_handle->db_query($sql, 'is', array($productID, $productType));
    }

    /**
     * @param $productID
     * @return array
     */
    public function read_entertainer_detail($productID)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT name, skill 
        FROM entertainmentpackage, entertainmentpackagemap, entertainer
        WHERE entertainmentpackage.event_ID = entertainmentpackagemap.entertainment_ID
        AND entertainmentpackagemap.entertainer_ID = entertainer.entertainer_ID
        AND entertainmentpackage.event_ID = ?
        ";
        return $db_handle->db_query($sql, 'i', array($productID));
    }

    /**
     * @param $productID
     * @return array
     */
    public function read_menuItem_detail($productID)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT quantity, name
        FROM menu, menumap, menuitem
        WHERE menu.event_ID = menumap.event_ID
        AND menumap.menuitem_ID = menuitem.menuitem_ID
        AND menu.event_ID = ?
        ";
        return $db_handle->db_query($sql, 'i', array($productID));
    }

    /**
     * @param $productType
     * @return double
     */
    public function min_price($productType)
    {
        $db_handle = new dbController();
        $sql = "SELECT min(price) as minPrice FROM event WHERE event_type = ?";
        return floatval($db_handle->db_query($sql, 's', array($productType))[0]['minPrice']);
    }

    /**
     * @param $productType
     * @return double
     */
    public function max_price($productType)
    {
        $db_handle = new dbController();
        $sql = "SELECT max(price) as maxPrice FROM event WHERE event_type = ?";
        return floatval($db_handle->db_query($sql, 's', array($productType))[0]['maxPrice']);
    }

    /**
     * @param $userID
     * @param $productType
     * @param $name
     * @param $price
     * @param $description
     * @param $created
     * @param $eventImage1
     * @param $eventImage2
     * @param $eventImage3
     * @param $address1
     * @param $address2
     * @param $postcode
     * @param $capacity
     * @param $region
     * @return bool
     */
    public function insertVenue($userID, $productType, $name, $price, $description, $created, $eventImage1, $eventImage2, $eventImage3, $address1, $address2, $postcode, $capacity, $region)
    {
        $db_handle = new dbController();
        $eventID = $this->insertEvent($userID, $productType, $name, $price, $description, $created, $eventImage1, $eventImage2, $eventImage3);
        $sql = "INSERT INTO venue (event_ID, address_line1, address_line2, post_code, capacity, region) VALUES (?,?,?,?,?,?)";
        return $db_handle->db_insert($sql, 'isssis', array($eventID, $address1, $address2, $postcode, $capacity, $region));
    }

    /**
     * @param $userID
     * @param $productType
     * @param $name
     * @param $price
     * @param $description
     * @param $created
     * @param $eventImage1
     * @param $eventImage2
     * @param $eventImage3
     * @param $duration
     * @param $entertainmentItems
     */
    public function insertEntertainmentPackage($userID, $productType, $name, $price, $description, $created, $eventImage1, $eventImage2, $eventImage3, $duration, $entertainmentItems)
    {
        $db_handle = new dbController();
        $eventID = $this->insertEvent($userID, $productType, $name, $price, $description, $created, $eventImage1, $eventImage2, $eventImage3);
        $sql = "INSERT INTO entertainmentpackage (event_ID, duration) VALUES (?,?)";
        $db_handle->db_insert($sql, 'ii', array($eventID, $duration));

        foreach ($entertainmentItems as $entertainmentItem) {
            $sql = "INSERT INTO entertainmentpackagemap (entertainment_ID, entertainer_ID) VALUES (?,?)";
            $db_handle->db_insert($sql, 'ii', array($eventID, $entertainmentItem));
        }
    }

    /**
     * @param $userID
     * @param $productType
     * @param $name
     * @param $price
     * @param $description
     * @param $created
     * @param $eventImage1
     * @param $eventImage2
     * @param $eventImage3
     * @param $duration
     * @param $menuItems
     */
    public function insertMenu($userID, $productType, $name, $price, $description, $created, $eventImage1, $eventImage2, $eventImage3, $duration, $menuItems)
    {
        $db_handle = new dbController();
        $eventID = $this->insertEvent($userID, $productType, $name, $price, $description, $created, $eventImage1, $eventImage2, $eventImage3);
        $sql = "INSERT INTO menu (event_ID, duration) VALUES (?,?)";
        $db_handle->db_insert($sql, 'ii', array($eventID, $duration));

        foreach ($menuItems as $menuItem) {
            $sql = "INSERT INTO menumap (event_ID, menuitem_ID, quantity) VALUES (?,?,?)";
            $db_handle->db_insert($sql, 'iii', array($eventID, $menuItem, 1));
        }
    }

    /**
     * @param $userID
     * @param $productType
     * @param $name
     * @param $price
     * @param $description
     * @param $created
     * @param $eventImage1
     * @param $eventImage2
     * @param $eventImage3
     * @return int|string
     */
    private function insertEvent($userID, $productType, $name, $price, $description, $created, $eventImage1, $eventImage2, $eventImage3)
    {
        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . "/assets/uploads/" . $productType . "/";
        $files = array('image1', 'image2', 'image3');

        foreach ($files as $eventImage) {
            $fileName = $_FILES[$eventImage]['name'];
            $fileTmpName = $_FILES[$eventImage]['tmp_name'];
            $uploadPath = $uploadDirectory . basename($fileName);
            move_uploaded_file($fileTmpName, $uploadPath);
        }
        $db_handle = new dbController();
        $sql = "INSERT INTO event (provider_ID, event_type, name, price, description, created, eventimage1, eventimage2, eventimage3) VALUES (?,?,?,?,?,?,?,?,?)";
        $db_handle->db_insert($sql, 'issdsssss', array($userID, $productType, $name, $price, $description, $created, $eventImage1, $eventImage2, $eventImage3));
        return $db_handle->db_lastID();
    }

    /**
     * @return array
     */
    function getMenuItems()
    {
        $db_handle = new dbController();
        $sql = "SELECT menuitem_ID, name FROM menuitem";
        return $db_handle->runBaseQuery($sql);
    }

    /**
     * @return array
     */
    function getEntertainers()
    {
        $db_handle = new dbController();
        $sql = "SELECT * FROM entertainer";
        return $db_handle->runBaseQuery($sql);
    }
}