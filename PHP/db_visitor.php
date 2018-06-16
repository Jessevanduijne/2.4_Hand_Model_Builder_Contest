<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 16-6-2018
 * Time: 12:42
 */
require_once "db.php";

class db_visitor
{
    private $MySQL;

    public function __construct(){
        $db = new db();
        $this->MySQL = $this->init();
    }

    private function init(){
        $str = file_get_contents("./config.json", true); //Krijg gegevens van config.json file
        $json = json_decode($str, true); // zet JSON om in een PHP-array
        //Test de functie:
        //echo '<pre>' . print_r($json, true) . '</pre>';

        return new mysqli($json['Database']['hostname'], $json['Database']['username'], $json['Database']['password'], $json['Database']['table']);
    }

    public function Register(){
        $visitor = null;

        require_once("./scripts/getguid.php");
        require_once("./Models/visitor.php");

        $uid = getGUID();
        $query = "INSERT INTO visitor (uid) VALUES ('".$uid."')";

        $this->MySQL->query($query);
        return $uid;
    }

    public function getIdFromUid($uid){

    }
}