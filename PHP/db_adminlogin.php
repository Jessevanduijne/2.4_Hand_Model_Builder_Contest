<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 17-6-2018
 * Time: 12:53
 */

class db_adminlogin
{
    private $MySQL;

    public function __construct(){
        $this->MySQL = $this->init();
    }

    private function init(){
        $str = file_get_contents("./config.json", true); //Krijg gegevens van config.json file
        $json = json_decode($str, true); // zet JSON om in een PHP-array
        //Test de functie:
        //echo '<pre>' . print_r($json, true) . '</pre>';

        return new mysqli($json['Database']['hostname'], $json['Database']['username'], $json['Database']['password'], $json['Database']['table']);
    }

    public function addAdminUID($uid){
        $query = "INSERT INTO adminuid (uid) VALUES ('$uid')";

        $this->MySQL->query($query);
    }

    public function removeAdminUID($uid){
        $query = "DELETE FROM adminuid WHERE uid = $uid";

        $this->MySQL->query($query);
    }

    public function hasUID($uid){
        $query = "SELECT uid FROM adminuid WHERE uid = $uid";

        $result = $this->MySQL->query($query);

        if ($result){
            return false;
        }
        else{
            return true;
        }
    }
}