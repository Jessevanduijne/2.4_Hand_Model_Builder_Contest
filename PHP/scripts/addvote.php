<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 15-6-2018
 * Time: 21:12
 */

//setcookie('test', 'recieved',  2147483647, '/');

    $id = $_POST['id'];

    require_once('../db/db_hand.php');
    $dbHand = new dbHand();

    $dbHand->addScore($id);
