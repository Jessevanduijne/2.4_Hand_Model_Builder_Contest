<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 16-6-2018
 * Time: 20:46
 */

require_once('db_hand_uid.php');
$dbHanduid = new db_hand_uid();

if (isset($_GET['id'])){
    if($dbHanduid->checkIfVotedFromUid($_COOKIE['visitor_guid'], $_GET['id'])){

        echo "<script type='text/javascript'>";
        echo "document.getElementById(\"stemKnop\").innerText = \"U heeft reeds gestemd!\";";
        echo "document.getElementById(\"stemKnop\").setAttribute('onclick', \"\");";
        echo "document.getElementById(\"stemKnop\").setAttribute('class', \"btn btn-large btn-red\");";
        echo "</script>";
    }
}
