<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 17-6-2018
 * Time: 12:46
 */

require_once('db_adminlogin.php');
$db = new db_adminlogin();

$str = file_get_contents("./config.json", true); //Krijg gegevens van config.json file
$json = json_decode($str, true); // zet JSON om in een PHP-array

if (!isset($_COOKIE['admin_guid'])) {
    if ($json['Login']['username'] === $_POST['username'] && $json['Login']['password'] === $_POST['password']) {
        require_once('getguid.php');
        $guid = getGUID();
        setcookie('admin_guid', $guid,  time()+3600 , '/');
        $db->addAdminUID($guid);
    }
}