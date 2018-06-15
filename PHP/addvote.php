<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 15-6-2018
 * Time: 21:12
 */

    require_once('Models/db_hand.php');
    //echo "<script> console.log('addvote id recieved from $_POST: .$id.</script>";
    $db = new dbHand();
    $id = $_POST['id'];
    $db->addScore($id);




