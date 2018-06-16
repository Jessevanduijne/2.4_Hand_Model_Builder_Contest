<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 16-6-2018
 * Time: 12:42
 */
require_once "db.php";

class visitor_db extends db
{
    private $MySQL;

    public function __construct(){
        $db = new db();
        $this->MySQL = $db->returnMySQL();
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