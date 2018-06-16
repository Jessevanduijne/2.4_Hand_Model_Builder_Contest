<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 16-6-2018
 * Time: 12:46
 */



if (!isset($_COOKIE['visitor_guid'])){
    require_once('visitor_db.php');
    require_once('visitor.php');
    $visitor_db = new visitor_db();

    //$result = $visitor_db->getVisitor($_COOKIE['visitor_guid']);

    //$visitor = new visitor($result->getId(), $result->getUid(), $result->getIp());

    //setcookie('visitor_guid', $visitor->getUid());

    if (!isset($_COOKIE['visitor_guid'])){
        $visitor_db->Register();
    }
}

