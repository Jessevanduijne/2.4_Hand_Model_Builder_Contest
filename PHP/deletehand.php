<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 17-6-2018
 * Time: 19:18
 */

require_once('admincheck.php');
require_once('db_hand.php');

$db = new dbHand();

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $db->deleteById($id);
}

