<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 16-6-2018
 * Time: 15:25
 */
require_once "db.php";
class db_hand_uid extends db
{
    private $MySQL;

    public function __construct()
    {
        $db = new db();
        $this->MySQL = $db->returnMySQL();
    }

}