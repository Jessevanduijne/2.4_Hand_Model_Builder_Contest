<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 16-6-2018
 * Time: 12:46
 */

if (!isset($_COOKIE['visitor_guid'])){
    require_once('./db_visitor.php');
    $visitor_db = new db_visitor();

    if (!isset($_COOKIE['visitor_guid'])){
        setcookie('visitor_guid', $visitor_db->Register());
    }
}

