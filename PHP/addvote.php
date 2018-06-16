<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 15-6-2018
 * Time: 21:12
 */


    require_once('./db_hand.php');
    require_once('./db_hand_uid.php');
    $dbHand = new dbHand();
    $dbHanduid = new db_hand_uid();

    $id = $_POST['id'];

    if (isset($_COOKIE['visitor_guid'])){
        $uid = $_COOKIE['visitor_guid'];

        if (!$dbHanduid->checkIfVotedFromUid($uid, $id)){
            $dbHanduid->registerVote($uid, $id);
            $dbHand->addScore($id);
        }
    }
