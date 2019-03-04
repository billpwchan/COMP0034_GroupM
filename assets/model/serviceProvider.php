<?php
/**
 * Created by PhpStorm.
 * User: Billp
 * Date: 4/3/2019
 * Time: 17:22
 */

class serviceProvider
{
    function service_provider_read($userID)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT servicesupplier.user_ID, company_name
        FROM user, servicesupplier
        WHERE user.user_ID = servicesupplier.user_ID
        AND user.user_ID = ?
        ";
        return $db_handle->db_query($sql, 'i', array($userID));
    }

    function provider_provided_service($userID)
    {
        $db_handle = new dbController();
        $sql = "
        SELECT event.name as 'Event Name', event.event_type as 'Type', event.price as 'Price', event.created as 'Created Time'
        FROM servicesupplier, event
        WHERE servicesupplier.user_ID = event.provider_ID
        AND servicesupplier.user_ID = ?
        ";
        return $db_handle->db_query($sql, 'i', array($userID));
    }
}