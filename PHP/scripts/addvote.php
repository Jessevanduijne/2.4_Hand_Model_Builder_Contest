<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 15-6-2018
 * Time: 21:12
 */

//setcookie('test', 'recieved',  2147483647, '/');

    $id = $_POST['id'];
    $ip = $_POST['ip'];

    require_once('Models/db_hand.php');
    $dbHand = new dbHand();