<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 25-6-2018
 * Time: 20:45
 */


require_once('db_hand.php');

$db = new dbHand();

$db->addTwitter($_POST['id']);