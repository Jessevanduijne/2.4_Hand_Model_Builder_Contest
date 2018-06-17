<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 16-6-2018
 * Time: 15:52
 */

class db
{
    private $MySQL;

    public function __construct(){
        $this->MySQL = $this->init();
    }

    public function init(){
        $str = file_get_contents("./config.json", true); //Krijg gegevens van config.json file
        $json = json_decode($str, true); // zet JSON om in een PHP-array
        //Test de functie:
        //echo '<pre>' . print_r($json, true) . '</pre>';

        return new mysqli($json['Database']['hostname'], $json['Database']['username'], $json['Database']['password'], $json['Database']['table']);
    }

    public function returnMySQL(){
        return $this->MySQL;
    }
}