<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 17-6-2018
 * Time: 13:05
 */

require_once('db_adminlogin.php');
$db = new db_adminlogin();

if(isset($_COOKIE['admin_guid'])){
    //checken of deze in de database voorkomt {betekend dat er voorheen netjes is ingelogd}
    $admin_guid = $_COOKIE['admin_guid'];

    if($db->hasUID($admin_guid)){
        //De GUID komt voor in de database
        //Doe niets
    }
    else if(!$db->hasUID($admin_guid)){
        //De GUID komt niet voor in de database
        header('Location: admin.php');
    }
}
else{
    header('Location: admin.php');
}