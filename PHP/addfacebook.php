<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 25-6-2018
 * Time: 20:26
 */

require_once('db_hand.php');

$db = new dbHand();

$db->addFacebook($_POST['id']);