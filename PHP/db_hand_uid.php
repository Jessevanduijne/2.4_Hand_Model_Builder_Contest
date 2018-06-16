<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 16-6-2018
 * Time: 15:25
 */
require_once("db.php");
class db_hand_uid
{
    private $MySQL;
    public function __construct()
    {
        $this->MySQL = $this->init();
    }

    private function init(){
        $str = file_get_contents("./config.json", true); //Krijg gegevens van config.json file
        $json = json_decode($str, true); // zet JSON om in een PHP-array
        //Test de functie:
        //echo '<pre>' . print_r($json, true) . '</pre>';

        return new mysqli($json['Database']['hostname'], $json['Database']['username'], $json['Database']['password'], $json['Database']['table']);
    }

    public function checkIfVotedFromUid($uid, $id){
        $uid = mysqli_real_escape_string($this->MySQL, $uid);
        $id = mysqli_real_escape_string($this->MySQL, $id);


        $query = "SELECT hand_id, uid FROM voted WHERE hand_id = '".$id."' AND uid = '".$uid."'";
        $result = $this->MySQL->query($query);

        if (mysqli_num_rows($result)==0)
        {
            return false;
        }
        else{
            return true;
        }
    }

    public function registerVote($uid, $id){
        //$query = "INSERT INTO `abcd` (`een`, `twee`) VALUES ('".$id."','".$uid."')";

        $uid = mysqli_real_escape_string($this->MySQL, $uid);
        $id = mysqli_real_escape_string($this->MySQL, $id);

        $query = "INSERT INTO voted (uid, hand_id) VALUES ('$uid','$id')";
        $result = $this->MySQL->query($query);

        if ($result){
            return true;
        }
        else{
            //setcookie('register', 'true');
            return false;
        }
    }
}