<?php
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
        AND event.name LIKE '%$searchKey%'
    ";
        return $db_handle->db_query($sql, 's', array('%' . $searchKey . '%'))[0]['rowCount'];
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

    /**
     * @param $from_record_num
     * @param $records_per_page
     * @return array
     */
    function read_venues($from_record_num, $records_per_page)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT event.event_ID, event.name, event.description, event.price, event.eventimage1, event.eventimage2, address, capacity, region
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
    function read_with_searched_name($from_record_num, $records_per_page, $searchKey)
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
        SELECT event.event_ID, event.provider_ID, event.event_type, event.name, event.price, event.description, event.created, event.eventimage1, event.eventimage2, event.eventimage3, address, capacity, region
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
}