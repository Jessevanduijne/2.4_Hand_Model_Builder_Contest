<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 16-6-2018
 * Time: 12:46
 */

if (!isset($_COOKIE['visitor_guid'])){
    require_once('./db/visitor_db.php');
    $visitor_db = new visitor_db();

    if (!isset($_COOKIE['visitor_guid'])){
        setcookie('visitor_guid', $visitor_db->Register());
    }
}

